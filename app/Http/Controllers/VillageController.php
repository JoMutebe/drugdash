<?php

namespace App\Http\Controllers;

use Auth;
use Datatables;
use App\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VillageController extends Controller
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
      return view('village.index');
    }
    public function get_villages(){
      return Datatables::of(Village::query())->addColumn('action', function ($village) {
                return '<a href="villages/'.$village->id.'"><i class="fa fa-eye"></i></a>';
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
      $subcounties = DB::table('subcounties')->get();
      $parishes = DB::table('parishes')->get();
      return view('village.create',compact('districts','counties','subcounties','parishes'));
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
      $village = new Village();
      $village->name = $request->name;
      $village->district_id=$request->district_id;
      $village->county_id=$request->county_id;
      $village->subcounty_id=$request->subcounty_id;
      $village->parish_id=$request->parish_id;
      $village->created_by=$user_id;
      $village->updated_by=$user_id;

      if($village->save()){
        flash("Village has been saved!","success");
        return redirect('/villages');
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
