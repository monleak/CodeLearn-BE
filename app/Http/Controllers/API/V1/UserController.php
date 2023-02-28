<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\ApiController;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    public function index(Request $request)
    {
        $users = User::paginate()->appends($request->query());
        return new UserCollection($users);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return UserResource
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, User $course)
    // {
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
