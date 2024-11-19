<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    use HasFactory;
    protected $fillable = ['cliente_id', 'servicio_id', 'fecha_inicio', 'fecha_fin', 'estado'];
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}
