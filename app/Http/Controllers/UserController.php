<?php

namespace App\Http\Controllers;

use App\User;
use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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

  public function index(){
    return view('user.index');
  }

  public function get_users(){
    return Datatables::of(User::query())->addColumn('action', function($user){
      return '<a href="users/'.$user->id.'"><i class="fa fa-eye"></i></a>';
    })->editColumn('id','ID: {{$id}}')->make(true);
  }
}
