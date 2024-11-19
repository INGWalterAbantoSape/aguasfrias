<?php

namespace App\Livewire\Registro;

use App\Models\Pago as ModelsPago;
use App\Models\Suscripcion;
use Livewire\Component;

class Pago extends Component
{
    public $suscripcion_id;
    public $monto;
    public $fechaPago;
    public $metodoPago;

    public $suscripciones;
    protected function rules(){
        return [
            'suscripcion_id' => 'required',
            'monto' => 'required|floatval',
            'fechaPago' => 'required|date',
            'metodoPago' => 'required',
        ];
    }
    protected $messages = [
        'suscripcion_id.required' => 'Cod.Suscripcion es requerido',
        'monto.required' => 'El monto es requerido',
        'fechaPago.required' => 'La fecha de inicio es requerida',
        'metodo.required' => 'El metodo de pago es requerido',
    ];

    public function mount(){
        $this->suscripciones = Suscripcion::all();
    }
    public function agregar(){
        $this->validate();
        ModelsPago::create([
            'suscripcion_id' => $this->suscripcion_id,
            'monto'          => $this->monto,
            'fechaPago'      => $this->fechaPago,
            'metodoPago'     => $this->metodoPago,
        ]);
        session()->flash('message','Pago guardado correctamenrte');
        dispatch('pago_creado');
        $this->reset([
            'suscripcion_id',
            'monto',
            'fechaPago',
            'metodoPago'
        ]);
    }
    public function render()
    {
        return view('livewire.registro.pago');
    }
}
