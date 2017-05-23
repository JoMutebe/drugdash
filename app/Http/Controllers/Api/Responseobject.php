<?php 
namespace App\Http\Controllers\Api;

class Responseobject {
	const status_ok = "Ok";
	const status_failed = "Failed";
	const code_ok = "100";
	const code_failed = "110";
	public $status;
	public $code;
	public $messages = array();
	public $result = array();
}