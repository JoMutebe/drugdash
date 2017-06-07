<?php

namespace App\Http\Controllers\Api;
use Log;

use DB;
use Auth;
use App\Stockitems;
use App\Stockitemchanges;
use App\Issue;
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
		//Log::info($data);
		$response = new ResponseObject;
		$change = new Stockitemchanges();
		//$change->district_id = 1;
		$change->created_by = 1;
		$change->updated_by = 1;
		$change->healthfacility_id = $data->facility;
		$change->stockitem_id = $data->item;
		$change->occured_at = $data->occured_at;
		$change->type = $data->type;
		$change->value = $data->value;

		if($change->save()){
			$response->status = $response::status_ok;
			$response->code = $response::code_ok;
			$response->result = $change;
		}
		else{
			$response->status = $response::status_failed;
			$response->code = $response::code_failed;
		}

		return Response::json(
				$response
			);
	}

	public function report_issue(){
		$request = json_decode(file_get_contents('php://input'));
		$response = new Responseobject;
		$user_id = 1;
		$issue = new Issue();
      	$issue->district_id = 1;
      	$issue->healthfacility_id = $request->facility;
      	$issue->status = 'Open';
      	$issue->urgency = $request->urgency;
      	$issue->description = $request->description;
      	$issue->created_by = $user_id;
      	$issue->updated_by = $user_id;

      	if($issue->save()){
      		$response->status = $response::status_ok;
			$response->code = $response::code_ok;
			$response->result = $issue;
      	}else{
      		$response->status = $response::status_failed;
			$response->code = $response::code_failed;
			$error_messages = array();			
			array_push($response->messages, "Couldn't save issue now, please try again later!");
      	}

      	return Response::json(
				$response
			);
		
	}

	public function make_order(){

	}

}
