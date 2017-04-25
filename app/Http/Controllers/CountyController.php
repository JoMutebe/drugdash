<?php

namespace App\Http\Controllers;

use Log;
use Auth;
use Datatables;
use App\County;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountyController extends Controller
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
        return view('county.index');
    }

    public function get_counties(){
      return Datatables::of(County::query())->addColumn('action',function($county){
        return '<a href="counties/' .$county->id.'"><i class="fa fa-eye"></i></a>';
      })->editcolumn('id','ID: {{$id}}')->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $districts = DB::table('districts')->get();
       return view('county.create', compact('districts'));
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
          $county = new County();
          $county->name = $request->name;
          $county->district_id = $request->district_id;
          $county->created_by = $user_id;
          $county->updated_by = $user_id;

          if($county->save()){
            flash("County has been saved!","success");
            return redirect('/counties');
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
      $county = County::findOrFail($id);
      return view('county.view', compact('county'));
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
