<?php

namespace App\Http\Controllers\Api;

use DB;
use Auth;
use App\Stockitems;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\Responseobject;

class ApiController extends Controller
{
	public function get_medicines(){
		$data = json_decode(file_get_contents('php://input'));
		$response = new ResponseObject;
		$response->code = $response::code_ok;
		$response->status = $response::status_ok;
		$response->result = DB::table('Stockitems')->orderBy('common_name')->get();
		return Response::json(
				$response
			);
	}

	public function get_healthcenters(){
		$data = json_decode(file_get_contents('php://input'));
		$response = new ResponseObject;
		$response->code = $response::code_ok;
		$response->status = $response::status_ok;
		$response->result = DB::table('healthfacilities')->orderBy('name')->get();
		return Response::json(
				$response
			);
	}

	public function get_healthcenter(){
		$data = json_decode(file_get_contents('php://input'));
		$response = new ResponseObject;
		return Response::json(
				$response
			);
	}

	public function get_district_information(){
		$data = json_decode(file_get_contents('php://input'));
		$response = new ResponseObject;
		return Response::json(
				$response
			);
	}

	public function report_on_item(){
		$data = json_decode(file_get_contents('php://input'));
		$response = new ResponseObject;
		return Response::json(
				$response
			);
	}
}