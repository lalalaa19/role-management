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

        
        User::factory()->create([
            'user_id' => 'USR001',
            'user_nik' => '1234567890123456',
            'user_name' => 'Test User',
            'user_email' => 'test@example.com',
            'user_personal_email' => 'personal@example.com',
            'user_medical' => 'Healthy',
            'user_grade_id' => 'GR001',
            'user_resign_detail' => 'Tidak ada rencana resign',
            'user_work_experience' => '1 tahun sebagai Software Engineer',
            'user_ava' => 'default.jpg',
            'user_gender' => 'Male',
            'user_emergency_name' => 'John Doe',
            'user_emergency_relationship' => 'Brother',
            'role_role_id' => 'RL005',
        ]);
    }
}
