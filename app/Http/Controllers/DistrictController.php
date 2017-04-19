<?php

namespace App\Http\Controllers;

use Auth;
use Datatables;
use App\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('district.index');
    }

    public function get_districts(){
      return Datatables::of(District::query())->addColumn('action', function ($district) {
                return '<a href="districts/'.$district->id.'"><i class="fa fa-eye"></i></a>';
            })->editColumn('id', 'ID: {{$id}}')->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('district.create');
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
        $district = new District();
        $district->name = $request->name;
        $district->dho_name = $request->dho_name;
        $district->region=$request->region;
        $district->dho_office_tel=$request->dho_office_tel;
        $district->dho_mobile_tel=$request->dho_mobile_tel;
        $district->zone=$request->zone;
        $district->medicines_manager_name=$request->medicines_manager_name;
        $district->medicines_manager_tel=$request->medicines_manager_tel;
        $district->address=$request->address;
        $district->created_by = $user_id;
        $district->updated_by = $user_id;

        if($district->save()){
          flash("District has been saved!","success");
          return redirect('/districts');
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
