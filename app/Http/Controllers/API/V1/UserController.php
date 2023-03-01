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

    public function currentUser(Request $request)
    {
        $user = $request->user();

        $userRoles = $user->roles;
        $permissions = $user->getAllPermissions();
        $permissions = $permissions->map(function ($permission) use ($userRoles) {
            $roles = [];
            foreach ($userRoles as $role) {
                if (in_array($role->name, $permission->roles->pluck("name")->toArray())) {
                    $roles[] = $role;
                }
            }
            $permission->roles = $roles;

            return $permission;
        });
        $permissions = collect($permissions)->pluck("name");

        return $this->respondSuccess([
            "user" => new UserResource($user),
            "permissions" => $permissions,
        ]);
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
