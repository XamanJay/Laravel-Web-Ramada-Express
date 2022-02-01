<?php

namespace App\Traits;


trait ApiResponser{

    protected function successResponse(string $message = null, $data = null, int $code = 200)
	{
		return response()->json([
			'status'=> 'Success', 
			'message' => $message, 
			'data' => $data,
            'code' => $code
		], $code);
	}


	protected function errorResponse($message = null, $code = null)
	{
		return response()->json([
			'status'=>'Error',
			'message' => $message,
			'data' => null,
            'code' => $code
		], $code);
	}

	protected function loginResponse($message = null, $data = null, $token = null, $code = 200)
	{
		return response()->json([
			'status'=> 'Success', 
			'message' => $message, 
			'data' => $data,
            'token' => $token,
            'code' => $code
		], $code);
	}
}