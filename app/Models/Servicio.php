<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','descripcion','precio','estado','tipo'];
    
    public function suscripciones(){
        return $this->hasMany(Suscripcion::class);
    }
}
