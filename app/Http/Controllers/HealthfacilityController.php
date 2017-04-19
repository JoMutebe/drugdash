<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthfacilityController extends Controller
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
        return view('healthfacility.index');
    }
    public function get_healthfacilities(){
      return Datatables::of(Healthfacility::query())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('healthfacility.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user_id= Auth::user()->id;
      $healthfacility=new Healthfacility();
      $healthfacility->name=$request->name;
      $healthfacility->general_tel=$request->general_tel;
      $healthfacility->general_email=$request->general_email;
      $healthfacility->code=$request->code;
      $healthfacility->incharge_name=$request->incharge_name;
      $healthfacility->incharge_tel=$request->incharge_tel;
      $healthfacility->store_manager_name=$request->store_manager_name;
      $healthfacility->store_manager_tel=$request->store_manager_tel;
      $healthfacility->general_tel=$request->general_tel;
      $healthfacility->bio_stat_name=$request->bio_stat_tel;
      $healthfacility->number_of_staff=$request->number_of_staff;
      $healthfacility->level=$request->level;
      $healthfacility->x_cord=$request->x_cord;
      $healthfacility->y_cord=$request->y_cord;
      $healthfacility->district_id=$request->district_id;
      $healthfacility->county_id=$request->county_id;
      $healthfacility->sub_county_id=$request->sub_county_id;
      $healthfacility->parish_id=$request->Parish_id;
      $healthfacility->village_id=$request->village_id;    
      $healthfacility->created_by = $user_id;
      $healthfacility->updated_by = $user_id;

      if($healthfacility->save()){
        flash("Healthfacility has been saved!","success");
        return redirect('/healthfacilities');
      }
      else{
        flash("Something went wrong while processing your request! Try again later","error");
      }
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
