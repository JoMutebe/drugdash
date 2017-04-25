<?php

namespace App\Http\Controllers;

use Auth;
use Datatables;
use App\Subcounty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcountyController extends Controller
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
      return view('subcounty.index');
    }
    public function get_subcounties(){
      return Datatables::of(Subcounty::query())->addColumn('action', function ($subcounty) {
                return '<a href="subcounties/'.$subcounty->id.'"><i class="fa fa-eye"></i></a>';
            })->editColumn('id', 'ID: {{$id}}')->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $districts = DB::table('districts')->get();
      $counties = DB::table('counties')->get();
      return view('subcounty.create', compact('districts','counties'));
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
      $subcounty = new Subcounty();
      $subcounty->name = $request->name;
      $subcounty->district_id = $request->district_id;
      $subcounty->county_id = $request->county_id;
      $subcounty->created_by = $user_id;
      $subcounty->updated_by = $user_id;
      if($subcounty->save()){
        flash("Subcounty has been saved!","success");
        return redirect('/subcounties');
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
      $subcounty = Subcounty::findOrFail($id);
      return view('subcounty.view', compact('subcounty'));
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
