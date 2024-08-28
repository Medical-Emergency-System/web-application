<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{

    public function sendResponse($result = null, $message = '')
    {
        $response = [
            'message' => $message,
            'data' => $result,
            'error_code' => 1,
        ];

        return response()->json($response, 200);
    }

    public function sendError($message = '')
    {
        $response = [
            'data' => null,
            'message' => $message,
            'error_code' => -1,
        ];
       
        return response()->json($response, 200);
    }

}