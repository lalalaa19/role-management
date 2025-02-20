<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $table = 'actions';
    protected $primaryKey = 'action_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;

    protected $fillable = [
        'action_id',
        'action_name',
        'action_status',
        'role_role_id'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_role_id', 'role_id');
    }
}