<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'coordinator',
        'foto',
    ];

    public function coordinator()
    {
        return $this->belongsTo(User::class, 'coordinator', 'id');
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class, 'id_pools', 'id');
    }
}
