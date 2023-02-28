<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function respondSuccess($result)
    {
        $response = [
            'success' => true,
            'data'    => $result,
        ];

        return response()->json($response, 200);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondSuccessWithMessage($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message'    => $message,
        ];

        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
