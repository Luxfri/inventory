<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Super Admin',
            'email'    => 'admin@test.com',
            'password' => bcrypt('passwordaman'),
            'role'     => 'admin',
        ]);
    }
}