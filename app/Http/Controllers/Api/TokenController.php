<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class TokenController extends Controller
{
	public function get_token(){
		return Response::json([
            'message' => 'Channels are not available for display'
        ], 200);

	}

}
