<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\API\V1\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends ApiController
{
    /**
     * Login API
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            /** @var \App\Models\User $user **/
            $user = Auth::user();
            $success['name'] = $user->name;
            $success['token'] =  $user->createToken('HUST eLearning')->plainTextToken;

            return $this->respondSuccessWithMessage($success, 'User login successfully');
        } else {
            return $this->respondError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }
}
