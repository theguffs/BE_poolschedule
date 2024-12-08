<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pool_id',
        'role_id',
        'date',
        'start_time',
        'end_time',
        'compensation',
    ];

    // Relazione molti-a-uno con l'utente
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Relazione molti-a-uno con la piscina
    public function pool()
    {
        return $this->belongsTo(Pool::class, 'pool_id', 'id');
    }

    // Relazione molti-a-uno con il ruolo
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'name');
    }
}
