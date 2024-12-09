<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pools',
        'name_role',
        'id_users',
        'data',
        'oraInizio',
        'oraFine',
        'compenso',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }

    public function pool()
    {
        return $this->belongsTo(Pool::class, 'id_pools', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'name_role', 'name');
    }
}
