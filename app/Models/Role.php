<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price_with_license',
        'price_without_license',
    ];

    public function shifts()
    {
        return $this->hasMany(Shift::class, 'name_role', 'name');
    }
}
