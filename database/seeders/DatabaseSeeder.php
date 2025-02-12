<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        
        Role::create([
            'role_id' => 'RL005',
            'role_name' => 'Admin', 
        ]);

        
        User::factory()->create([
            'user_id' => 'USR001',
            'user_nik' => '1234567890123456',
            'user_name' => 'Test User',
            'user_email' => 'test@example.com',
            'user_password' => bcrypt('password'),
            'user_medical' => 'Healthy',
            'user_grade_id' => 'GR001',
            'user_emergency_name' => 'John Doe',
            'user_emergency_relationship' => 'Brother',
            'role_role_id' => 'RL005',
        ]);
    }
}
