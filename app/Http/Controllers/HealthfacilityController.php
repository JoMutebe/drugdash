<?php

namespace App\Http\Controllers;

use Auth;
use Datatables;
use App\Healthfacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;

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
      return Datatables::of(Healthfacility::query())->addColumn('action', 
          function ($healthfacility) {
                return '<a href="healthfacilities/'.$healthfacility->id.'"><i class="fa fa-eye"></i></a>';
            })
          ->editColumn('id', 'ID: {{$id}}')->make(true);
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
      $villages = DB::table('villages')->get();
      return view('healthfacility.create',compact('districts','counties','subcounties','parishes','villages'));
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
      $healthfacility->address=$request->address;
      $healthfacility->incharge_name=$request->incharge_name;
      $healthfacility->incharge_tel=$request->incharge_tel;
      $healthfacility->store_manager_name=$request->store_manager_name;
      $healthfacility->store_manager_tel=$request->store_manager_tel;
      $healthfacility->general_tel=$request->general_tel;
      $healthfacility->bio_stat_name=$request->bio_stat_name;
      $healthfacility->bio_stat_tel=$request->bio_stat_tel;
      $healthfacility->number_of_staff=$request->number_of_staff;
      $healthfacility->level=$request->level;
      $healthfacility->x_cord=$request->x_cord;
      $healthfacility->y_cord=$request->y_cord;
      $healthfacility->district_id=$request->district_id;
      $healthfacility->county_id=$request->county_id;
      $healthfacility->subcounty_id=$request->subcounty_id;
      $healthfacility->parish_id=$request->parish_id;
      $healthfacility->village_id=$request->village_id;
      $healthfacility->created_by = $user_id;
      $healthfacility->updated_by = $user_id;
      $healthfacility->activation_code = strtoupper(str_random(8));

      if($healthfacility->save()){
        flash("Healthfacility has been saved!","success");
        return redirect('/healthfacilities/'.$request->healthfacility_id);
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
       
        $districts = DB::table('districts')->get();
        $healthfacility = Healthfacility::findOrFail($id);
        $supplies = DB::table('stockitems')->get();
        $hcf_supplies  = DB::table('stockitemchanges')
                        ->join('stockitems','stockitemchanges.stockitem_id','=','stockitems.id')
                        ->join('healthfacilities','stockitemchanges.healthfacility_id','=','healthfacilities.id')
                        ->join('users','stockitemchanges.created_by','=','users.id')
                        ->select('users.name as created_by','stockitems.common_name as medicine','stockitems.unit_of_measure','healthfacilities.name as facility','stockitemchanges.value','stockitemchanges.type','stockitemchanges.balance', 'stockitemchanges.created_at')
                        ->where('stockitemchanges.healthfacility_id',$id)->orderBy('stockitemchanges.id','DESC')->paginate(20,['*'],'supplies');
        
        $hcf_issues = DB::table('issues')
                      ->join('users','issues.created_by','=','users.id')
                      ->select('issues.description','issues.status','issues.urgency','users.name as raised_by','issues.created_at')
                      ->where([['healthfacility_id','=', $id]])->orderBy('issues.id','DESC')->paginate(5,['*'],'issues');
        return view('healthfacility.view', compact('healthfacility','districts','supplies','hcf_supplies','hcf_issues'));
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
        $healthfacility = Healthfacility::findOrFail($id);
        return view('healthfacility.edit', compact('healthfacility'));
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
        $healthfacility = Healthfacility::findOrFail($id);
        $healthfacility->incharge_name=$request->incharge_name;
        $healthfacility->incharge_tel=$request->incharge_tel;
        $healthfacility->store_manager_name=$request->store_manager_name;
        $healthfacility->store_manager_tel=$request->store_manager_tel;
        $healthfacility->bio_stat_name=$request->bio_stat_name;
        $healthfacility->bio_stat_tel=$request->bio_stat_tel;
        $healthfacility->activation_code = strtoupper(str_random(8));
        if($healthfacility->save()){
        flash("Healthfacility has been saved!","success");
        return redirect('/healthfacilities/'.$request->healthfacility_id);
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

    public function getHcfSupplies($id){}

    public function getHcfIssues($id){}
}
