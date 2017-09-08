<?php

namespace App\Http\Controllers\Api;
use Log;

use DB;
use Auth;
use App\Stockitems;
use App\Stockitemchanges;
use App\Issue;
use App\Healthfacility;
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
		$response->result = DB::table('stockitems')->orderBy('common_name')->get();
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

	public function report_on_item(Request $request){
		$data = $request->json()->all();
		Log::info($data);		
		$response = new ResponseObject;
		$change = new Stockitemchanges();
		$change->created_by = $data['created_by'];
		$change->updated_by = $data['updated_by'];
		$change->healthfacility_id = $data['healthfacility_id'];
		$change->stockitem_id = $data['stockitem_id'];
		$change->occured_at = $data['occured_at'];
		$change->type = $data['type'];
		$change->value = $data['value'];
		$change->balance = $data['value'];
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
		$issue = new Issue();
		$issue->status = 'Open';
      	$issue->district_id = 1;
      	$issue->healthfacility_id = $request->healthfacility_id;      	
      	$issue->urgency = $request->urgency;
      	$issue->description = $request->description;
      	$issue->created_by = $request->created_by;
      	$issue->updated_by = $request->updated_by;

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
		//incase people make orders
	}

	public function report_app_open(){
		//we want to track how oftern people use the application
	}

	public function retrieve_issues(){
		//All devices in a given district should be able to see issues reported by one of them
	}

	public function activate(Request $request){
		$validator = Validator::make($request->json()->all(),[
				'code' => 'required|string|min:5'
			]);
		$response = new ResponseObject;
		if($validator->fails()){
			$response->status = $response::status_failed;
			$response->code = $response::code_failed;
			foreach ($validator->errors()->getMessages() as $item) {
				array_push($response->messages,$item);
			}
			return Response::json($response);
		}
		else{
			$data = $request->json()->all();
			$healthfacility = Healthfacility::where(['activation_code' => $data["code"] ])->first();

			if(count($healthfacility) < 1){
				$response->status = $response::status_failed;
				$response->code = $response::code_failed;
				array_push($response->messages,'Invalid activation code. Please try again');
				return Response::json($response);
			}
			$response->status = $response::status_ok;
			$response->code = $response::code_ok;
			$facility = [
				'incharge' => $healthfacility->incharge_name,
				'hcname' => $healthfacility->name,
				'hcid' => $healthfacility->id,
				'contact' => $healthfacility->general_tel
			];
			$response->result = $facility;

			return Response::json($response);
		}
	}

	public function sync_supplies(Request $request){
		$data = $request->json()->all();
		Log::info($data);
		$response = new ResponseObject();
		$response->status = $response::status_ok;
		$response->code = $response::code_ok;
		$result = [];
		foreach($data as $item){
			Log::info($item->value);
			$record = Stockitemchanges::find()->where(['healthfacility_id' => $item->healthfacility_id,'offline_id' => $item->id])->first();
			if(count($record) < 1){
				$change = new Stockitemchanges();
				$change->offline_id = $item->id;
				$change->stockitem_id = $item->stockitem_id;
				$change->type = $item->type;
				$change->occured_at = $item->occured_at;
				$change->value = $item->value;
				$change->created_by = $item->created_by;
				$change->updated_by = $item->updated_by;
				$change->created_at = $item->created_at;
				$change->updated_at = $item->updated_at;
				$change->balance = $item->balance;
				$change->healthfacility_id = $item->healthfacility_id;
				try{
					if($change->save()){
						$res = [];
						$res->id = $item->id;
						$res->online_id = $change->id;
						array_push($result,$res);
					}
				}catch(\Exception $e){
					Log:info($e);
				}
			}
			else{
				$record->offline_id = $item->id;
				$record->stockitem_id = $item->stockitem_id;
				$record->type = $item->type;
				$record->occured_at = $item->occured_at;
				$record->value = $item->value;
				$record->created_by = $item->created_by;
				$record->updated_by = $item->updated_by;
				$record->created_at = $item->created_at;
				$record->updated_at = $item->updated_at;
				$record->balance = $item->balance;
				$record->healthfacility_id = $item->healthfacility_id;
				try{
					if($record->save()){
						$res = [];
						$res->id = $item->id;
						$res->online_id = $record->id;
						array_push($result,$res);
					}
				}catch(\Exception $e){
					Log:info($e);
				}
			}
		}
		$response->result = $result;
		return Response::json($response);
	}

	public function sync_issues(Request $request){
		$data = $request->json()->all();
		Log::info($data);
		$response = new ResponseObject();
		$response->status = $response::status_ok;
		$response->code = $response::code_ok;
		$response->result = [
			[
				"id" => 4,
				"online_id" => 1
			],
			[
				"id" => 3,
				"online_id" =>  23
			]
		];
		return Response::json($response);

	}
}
