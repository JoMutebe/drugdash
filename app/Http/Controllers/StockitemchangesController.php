<?php

namespace App\Http\Controllers;

use Auth;
use Datatables;
use App\Stockitemchanges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockitemchangesController extends Controller
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
        return view('stockitemchanges.index');
    }
    public function get_stockitemchanges(){
      return Datatables::of(Stockitemchanges::query())->addColumn('action', function ($stockitemchanges) {
                return '<a href="stockitemchanges/'.$stockitemchanges->id.'"><i class="fa fa-eye"></i></a>';
            })->editColumn('id', 'ID: {{$id}}')->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $healthfacilities = DB::table('healthfacilities')->get();
        return view('stockitemchanges.create',compact('healthfacilities'));
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
      $stockitemchanges = new Stockitemchanges();
      $stockitemchanges->item_id = $request->item_id;
      $stockitemchanges->healthfacility_id = $request->healthfacility_id;
      $stockitemchanges->type = $request->type;
      $stockitemchanges->occured_at = $request->occured_at;
      $stockitemchanges->value = $request->value;
      $stockitemchanges->created_by = $user_id;
      $stockitemchanges->updated_by = $user_id;

      if($stockitemchanges->save()){
        flash("StockItem Change has been saved!","success");
        return redirect('/stockitemchanges');
      }
      else{
        flash("Something went wrong while processing your request! Try again later","error");
      }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
