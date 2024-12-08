<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'indirizzo',
        'coordinatore',
        'foto',
    ];

    // Relazione uno-a-uno con il coordinatore (utente)
    public function coordinator()
{
    return $this->belongsTo(User::class, 'coordinator', 'id');
}

    // Relazione uno-a-molti con i turni
    public function shifts()
    {
        return $this->hasMany(Shift::class, 'pool_id', 'id');
    }
}
