<?php

namespace App\Http\Controllers;

use Log;
use Auth;
use Datatables;
use App\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('issue.index');
    }
    
    public function get_issues(){
      return Datatables::of(Issue::query())->addColumn('action', function ($issue) {
                return '<a href="issue/'.$issue->id.'"><i class="fa fa-eye"></i></a>';
            })->editColumn('id', '{{$id}}')->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $districts = DB::table('districts')->get();
      $healthfacilities=DB::table('healthfacilities')->get();
      return view('issue.create',compact('districts','healthfacilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Log::info($request);
      $user_id = Auth::user()->id;
      $issue = new Issue();
      $issue->district_id = $request->district_id;
      $issue->healthfacility_id = $request->healthfacility_id;
      $issue->status = $request->status;
      $issue->urgency = $request->urgency;
      $issue->description = $request->description;
      $issue->created_by = $user_id;
      $issue->updated_by = $user_id;

      if($issue->save()){
        flash("Issue has been saved!","success");
        return redirect('/healthfacility_id');
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
