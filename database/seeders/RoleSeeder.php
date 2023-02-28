<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
            [
                "name" => "super_admin",
                "description" => "Super Admin",
                "type" => "system",
                "permissions" => [
                    "create_course", "update_course", "delete_course", "view_course",
                    "create_lesson", "update_lesson", "delete_lesson", "view_lesson",
                    "create_comment", "update_comment", "delete_comment", "view_comment",
                    "update_permission_role", "view_permission", "create_role", "update_role", "delete_role", "assign_role",
                    "create_review", "update_review", "create_account"
                ]
            ],
            [
                "name" => "teacher",
                "description" => "Giảng viên",
                "type" => "system",
                "permissions" => [
                    "update_course", "view_course",
                    "create_lesson", "update_lesson", "delete_lesson", "view_lesson",
                    "create_comment", "update_comment", "delete_comment", "view_comment",
                    "create_review", "update_review"
                ]
            ],
            [
                "name" => "free_account",
                "description" => "Người dùng miễn phí",
                "type" => "system",
                "permissions" => []
            ],
            [
                "name" => "paid_account",
                "description" => "Người dùng trả phí",
                "type" => "system",
                "permissions" => ["create_review", "update_review"]
            ],
            [
                "name" => "guest",
                "description" => "Guest",
                "type" => "system",
                "permissions" => ["view_lesson"]
            ],
        ];

        foreach ($roles as $role) {
            $modelRole = Role::where("name", $role["name"])->first();

            if (empty($modelRole)) {
                $modelRole = Role::create(
                    [
                        "name" => $role["name"],
                        "description" => $role["description"],
                        "type" => $role["type"],
                    ]
                );
                $modelRole->givePermissionTo($role["permissions"]);
            } else {
                $modelRole->update(
                    [
                        "name" => $role["name"],
                        "description" => $role["description"],
                        "type" => $role["type"],
                        "order" => $role["order"],
                    ]
                );
            }

            if ($modelRole["name"] == "super_admin") {
                $modelRole->givePermissionTo(Permission::all());
            }
        }
    }
}
