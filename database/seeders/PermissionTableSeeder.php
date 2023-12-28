<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'user-dashboard',
           'admin-dashboard',
           'user-submit-order',
           'user-request-recommendations',
           'all-submit-order',
           'all-request-recommendations',
           'popup-list',
           'popup-create',
           'popup-edit',
           'popup-delete',
           'publication-list',
           'publication-create',
           'publication-edit',
           'publication-delete',
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
