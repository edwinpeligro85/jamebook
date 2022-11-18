<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Orchid\Platform\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'id' => 1,
            'slug' => 'super.admin',
            'name' => 'Super Admin',
            'permissions' => json_decode('{"platform.systems.roles":true,"platform.systems.users":true,"platform.systems.attachment":true,"platform.index":true}')
        ]);
    }
}
