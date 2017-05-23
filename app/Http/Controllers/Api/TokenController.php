<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Api\Responseobject;
use Auth;

class TokenController extends Controller
{
	public function get_token(Request $request){
		$data = json_decode(file_get_contents('php://input'));
		// $phone = $data->username;
		$password = $data->password;
		$email = $data->email;
		$response = new ResponseObject;
		if(Auth::attempt(['email' => $email,'password' =>$password])){
			$response->status = $response::status_ok;
			$response->code = $response::code_ok;
			$response->result = Auth::user();
		}
		else{
			$response->status = $response::status_failed;
			$response->code = $response::code_failed;
			$error_messages = array();			
			array_push($response->messages, "No user with specified email and password");
		}
		
		return Response::json(
				$response
			);
	}

	

}
