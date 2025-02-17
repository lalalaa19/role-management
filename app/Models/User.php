<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

     protected $primaryKey = 'user_id';
     public $incrementing = false;
     protected $keyType = 'string';


    protected $fillable = [

        // Personal information
        'user_id',
        'user_nik',
        'user_name',
        'user_email',
        'user_personal_email',
        'user_password',
        'user_birthday',
        'user_phone',
        'user_address',
        'user_gender',
        'user_ava',

        //Employment details 
        'user_grade_id',
        'user_join_date',
        'user_biotime_id',
        'user_probation_end',
        'user_contract_start',
        'user_contract_end',
        'user_permanent_date',
        'user_resign_date',
        'user_resign_detail',
        'user_work_experience',
        'user_employee_id',
        // 'user_type' => 'Customer',
        'user_status',

        // Emergency Contact
        'user_emergency_name',
        'user_emergency_relationship',
        'user_emergency_contact',

        // Medical details
        'user_blood_type',
        'user_medical',
        // 'user_leave' => '1',

        // Financial & docs
        'user_bank_account',
        'user_passport',
        'user_passport_date',
        'user_passport_details',

        // Roles & permission
        // 'role_role_id' => 'RL005',
        'user_lead',
        'user_referral'
    ];

    protected $attributes = [
        'user_type' => 'Customer',
        'user_leave' => '1',
        'role_role_id' => 'RL005',
    ];
    


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Hash password secara otomatis
    public function setUserPasswordAttribute($value)
    {
        $this->attributes['user_password'] = Hash::make($value);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}