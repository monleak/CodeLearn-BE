<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            // CRUD Course
            [
                "name" => "create_course",
                "description" => "Tạo khóa học",
                "type" => "system"
            ],
            [
                "name" => "update_course",
                "description" => "Sửa khóa học",
                "type" => "system"
            ],
            [
                "name" => "delete_course",
                "description" => "Xóa khóa học",
                "type" => "system"
            ],
            [
                "name" => "view_course",
                "description" => "Xem khóa học",
                "type" => "system"
            ],

            // CRUD Lesson
            [
                "name" => "create_lesson",
                "description" => "Tạo bài học",
                "type" => "system"
            ],
            [
                "name" => "update_lesson",
                "description" => "Sửa bài học",
                "type" => "system"
            ],
            [
                "name" => "delete_lesson",
                "description" => "Xóa bài học",
                "type" => "system"
            ],
            [
                "name" => "view_lesson",
                "description" => "Xem bài học",
                "type" => "system"
            ],

            // CRUD Comment
            [
                "name" => "create_comment",
                "description" => "Tạo bình luận",
                "type" => "system",
            ],
            [
                "name" => "update_comment",
                "description" => "Sửa bình luận",
                "type" => "system"
            ],
            [
                "name" => "delete_comment",
                "description" => "Xóa bình luận",
                "type" => "system"
            ],
            [
                "name" => "view_comment",
                "description" => "Xem bình luận",
                "type" => "system"
            ],

            // Permissions and Roles
            [
                "name" => "update_permission_role",
                "description" => "Thêm/xóa quyền vào nhóm quyền",
                "type" => "system"
            ],
            [
                "name" => "view_permission",
                "description" => "Xem phân quyền",
                "type" => "system"
            ],
            [
                "name" => "create_role",
                "description" => "Tạo nhóm quyền",
                "type" => "system"
            ],
            [
                "name" => "update_role",
                "description" => "Sửa nhóm quyền",
                "type" => "system"
            ],
            [
                "name" => "delete_role",
                "description" => "Xóa nhóm quyền",
                "type" => "system"
            ],
            [
                "name" => "assign_role",
                "description" => "Phân nhóm quyền",
                "type" => "system"
            ],


            // Review
            [
                "name" => "create_review",
                "description" => "Tạo đánh giá",
                "type" => "system"
            ],
            [
                "name" => "update_review",
                "description" => "Sửa đánh giá",
                "type" => "system"
            ],

            // User
            [
                "name" => "create_account",
                "description" => "Tạo tài khoản",
                "type" => "system",
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(["name" => $permission["name"]], $permission);
        }
    }
}
