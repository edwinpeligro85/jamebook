<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Michael',
            'email' => 'admin@jamebook.com',
            'password' => Hash::make("12345678"),
            'permissions' => json_decode('{"platform.systems.roles":true,"platform.systems.users":true,"platform.systems.attachment":true,"platform.index":true}')
        ]);
        $user->replaceRoles([1]);
    }
}
