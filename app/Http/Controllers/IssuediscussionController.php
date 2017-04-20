<?php

namespace App\Http\Controllers;

use Auth;
use Datatables;
use App\Issuediscussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IssuediscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('issuediscussion.index');
    }
    public function get_issues(){
      return Datatables::of(Issuediscussion::query())->addColumn('action', function ($issuediscussion) {
                return '<a href="issuediscussions/'.$issuediscussion->id.'"><i class="fa fa-eye"></i></a>';
            })->editColumn('id', 'ID: {{$id}}')->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $issues = DB::table('issues')->get();
      return view('issuediscussion.create',compact('issues'));
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
      $issuediscussion = new Issuediscussion();
      $issuediscussion->id = $request->id;
      $issuediscussion->issue_id = $request->issue_id;
      $issuediscussion->description = $request->description;
      $issuediscussion->created_by = $user_id;
      $issuediscussion->updated_by = $user_id;

      if($issuediscussion->save()){
        flash("Issue Discussion has been saved!","success");
        return redirect('/issuediscussion');
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
