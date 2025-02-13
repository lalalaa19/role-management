<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'user_id';
    public $incrementing = false; 
    protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'user_nik',
        'user_name',
        'user_email',
        'user_password',
        'remember_token',
    ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'user_password',
        'remember_token',
    ];

    /**

     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'string',
        'email_verified_at' => 'datetime',
        'user_password' => 'hashed',
    ];
}
