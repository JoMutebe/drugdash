<?php

namespace App\Http\Controllers;

use Auth;
use App\Parish;
use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParishController extends Controller
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
      return view('parish.index');
    }

    public function get_parishes(){
      return Datatables::of(Parish::query())->addColumn('action', function ($parish) {
                return '<a href="parishes/'.$parish->id.'"><i class="fa fa-eye"></i></a>';
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
        return view('parish.create',compact('districts','counties','subcounties'));
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
      $parish = new Parish();
      $parish->name = $request->name;
      $parish->district_id = $request->district_id;
      $parish->county_id = $request->county_id;
      $parish->subcounty_id = $request->subcounty_id;
      $parish->created_by = $user_id;
      $parish->updated_by = $user_id;

      if($parish->save()){
        flash("Parish has been saved!","success");
        return redirect('/parishes');
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
      $parish = Parish::findOrFail($id);
      return view('parish.view', compact('parish'));
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
