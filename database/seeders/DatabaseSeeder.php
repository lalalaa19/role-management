<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        
        Role::create([
            'role_id' => 'RL005',
            'role_name' => 'User', 
        ]);

        
        // User::factory()->create([
        //     'user_id' => 'USR001',
        //     'user_name' => 'Test User',
        //     'user_email' => 'test@example.com',
        //     'user_ava' => 'default.jpg',
        //     'user_gender' => 'Male',
        //     'user_status' => 'Intern',
        //     'role_role_id' => 'RL005',
        // ]);
    }
}
