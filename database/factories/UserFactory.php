<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->uuid(),
            'user_nik' => fake()->numerify('##############'), 
            'user_name' => fake()->name(), 
            'user_email' => fake()->unique()->safeEmail(), 
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
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'user_email_verified_at' => null,
        ]);
    }
}
