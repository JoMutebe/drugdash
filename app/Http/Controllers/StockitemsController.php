<?php

namespace App\Http\Controllers;

use Auth;
use Datatables;
use App\Stockitems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockitemsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('stockitems.index');
    }
    public function get_stockitems(){
      return Datatables::of(Stockitems::query())->addColumn('action', function ($stockitems) {
                return '<a href="stockitems/'.$stockitems->id.'"><i class="fa fa-eye"></i></a>';
            })->editColumn('id', 'ID: {{$id}}')->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('stockitems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user_id = Auth::user()->id;
      $stockitems = new Stockitems();
      $stockitems->common_name = $request->common_name;
      $stockitems->brand_name = $request->brand_name;
      $stockitems->code = $request->code;
      $stockitems->category = $request->category;
      $stockitems->unit_of_measure = $request->unit_of_measure;
      $stockitems->unit_price = $request->unit_price;
      $stockitems->created_by = $user_id;
      $stockitems->updated_by = $user_id;

      if($stockitems->save()){
        flash("StockItem has been saved!","success");
        return redirect('/stockitems');
      }
      else{
        flash("Something went wrong while processing your request! Try again later","error");
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response'''
     */
    public function show($id)
    {
         //$supplies = DB::table('stockitems')->get($id);
         $stockitems = Stockitems::findOrFail($id);
         return view('stockitems.view',compact('stockitems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $stockitems = Stockitems::findOrFail($id);
        return view ('stockitems.edit', compact ('stockitems'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $stockitems = Stockitems::findOrFail($id);
        $stockitems->common_name = $request->common_name;
        $stockitems->brand_name = $request->brand_name;
        $stockitems->code = $request->code;
        $stockitems->category = $request->category;
        $stockitems->unit_of_measure = $request->unit_of_measure;
        $stockitems->unit_price = $request->unit_price;
        $stockitems->created_by = Auth::user()->id;
        $stockitems->updated_by = Auth::user()->id;
       if($stockitems->save()){
        flash("StockItem has been saved!","success");
        return redirect('/stockitems');
      }
      else{
        flash("Something went wrong while processing your request! Try again later","error");
      }

    }
        

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
