<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'email', 'telefono', 'direccion','estado','numero_suscripciones','puntos'];

    public function suscripciones()
    {
        return $this->hasMany(Suscripcion::class);
    }
}
