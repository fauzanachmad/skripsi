<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'setting_create',
            ],
            [
                'id'    => 18,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 19,
                'title' => 'setting_show',
            ],
            [
                'id'    => 20,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 21,
                'title' => 'setting_access',
            ],
            [
                'id'    => 22,
                'title' => 'prediction_access',
            ],
            [
                'id'    => 23,
                'title' => 'predict_history_create',
            ],
            [
                'id'    => 24,
                'title' => 'predict_history_edit',
            ],
            [
                'id'    => 25,
                'title' => 'predict_history_show',
            ],
            [
                'id'    => 26,
                'title' => 'predict_history_delete',
            ],
            [
                'id'    => 27,
                'title' => 'predict_history_access',
            ],
            [
                'id'    => 28,
                'title' => 'dataset_access',
            ],
            [
                'id'    => 29,
                'title' => 'article_create',
            ],
            [
                'id'    => 30,
                'title' => 'article_edit',
            ],
            [
                'id'    => 31,
                'title' => 'article_show',
            ],
            [
                'id'    => 32,
                'title' => 'article_delete',
            ],
            [
                'id'    => 33,
                'title' => 'article_access',
            ],
            [
                'id'    => 34,
                'title' => 'article_set_create',
            ],
            [
                'id'    => 35,
                'title' => 'article_set_edit',
            ],
            [
                'id'    => 36,
                'title' => 'article_set_show',
            ],
            [
                'id'    => 37,
                'title' => 'article_set_delete',
            ],
            [
                'id'    => 38,
                'title' => 'article_set_access',
            ],
            [
                'id'    => 39,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
