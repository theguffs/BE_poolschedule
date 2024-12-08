<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'name'; // Usa 'name' come chiave primaria
    public $incrementing = false;  // Disabilita l'incremento automatico
    protected $keyType = 'string'; // Specifica il tipo della chiave primaria

    protected $fillable = [
        'name',
        'prezzoConBrevetto',
        'prezzoSenzaBrevetto',
    ];

    // Relazione uno-a-molti con i turni (opzionale)
    public function shifts()
    {
        return $this->hasMany(Shift::class, 'role_id', 'name');
    }
}
