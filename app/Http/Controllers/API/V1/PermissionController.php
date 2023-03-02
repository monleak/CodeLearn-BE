<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\ApiController;
use App\Http\Requests\API\Role\CreateRoleRequest;
use App\Http\Requests\API\Role\UpdateRoleRequest;
use App\Http\Resources\PermissionResource;
use App\Http\Resources\RoleResource;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends ApiController
{
    public function getAllRoles()
    {
        $roles = Role::with(["permissions"])->get();
        return RoleResource::collection($roles);
    }

    public function getAllPermissions()
    {
        $permissions = Permission::all();
        return PermissionResource::collection($permissions);
    }

    // public function getAllEmployeesWithRole(Request $request)
    // {
    //     $search = $request->search;
    //     $this->userRepository->with(['roles.permission']);
    //     $employees = $this->userRepository->employees($search);

    //     return $this->respondSuccess([
    //         "employees" => $employees,
    //         "permission" => [
    //             "assign" => $this->user->can("assign", "Spatie\Permission\Models\Role")
    //         ]
    //     ]);
    // }

    // public function getPermissionsByUser(User $user)
    // {
    //     $permissions = $this->permissionRepository->byUser($user);
    //     return $this->respondSuccess([
    //         "permissions" => $permissions,

    //     ]);
    // }

    public function assignRoleToUser(Role $role, User $user)
    {
        $user->assignRole($role);
        return $this->respondSuccessWithMessage([], "Thêm nhóm quyền thành công");
    }

    public function removeRoleFromUser(Role $role, User $user)
    {
        $user->removeRole($role);
        return $this->respondSuccessWithMessage([], "Bỏ nhóm quyền thành công");
    }

    public function addPermissionToRole(Permission $permission, Role $role)
    {
        $role->givePermissionTo($permission);
        return $this->respondSuccessWithMessage([], "Thêm quyền thành công");
    }

    public function removePermissionFromRole(Permission $permission, Role $role)
    {
        $role->revokePermissionTo($permission);
        return $this->respondSuccessWithMessage([], "Loại bỏ quyền thành công");
    }

    public function createRole(CreateRoleRequest $request)
    {
        $description = $request->description;
        $name = strtolower(str_replace(" ", "_", convert_vi_to_en($description)));
        $role = Role::create([
            "name" => $name,
            "description" => $description,
        ]);

        return new RoleResource($role->loadMissing("permissions"));
    }

    public function updateRole(Role $role, UpdateRoleRequest $request)
    {
        $role->update([
            "description" => $request->description,
        ]);

        return new RoleResource($role);
    }

    public function deleteRole(Role $role)
    {
        $role->delete();
        return $this->respondSuccessWithMessage([], "Xóa thành công");
    }
}
