<?php

namespace App\Livewire\Actualizar;

use App\Models\Pago as ModelsPago;
use App\Models\Suscripcion;
use Livewire\Component;

class Pago extends Component
{
    // datos de la tabla pagos 
    public $pago_id;
    public $suscripcion_id;
    public $monto;
    public $fecha_pago;
    public $metodo_pago;
    // variables a inicializar
    public $suscripciones;
    protected $rules = [
        'pago_id'        => 'required',
        'suscripcion_id' => 'required',
        'monto'          => 'required',
        'fecha_pago'     => 'required',
        'metodo_pago'    => 'required',
    ];
    protected $messages = [
        'pago_id.required'               => 'el codigo es requerido',
        'suscripcion_id.required'        => 'el codigo de suscripcion es requerido',
        'monto.required'                 => 'el monto es requerido',
        'fecha_pago.required'            => 'la fecha de pago es requerida',
        'metodo_pago.required'           => 'metodo de pago es requirido'
    ];
    // contructor
    public function mount(ModelsPago $pago){
        // obtengo las suscripciones
        $this->suscripciones    = Suscripcion::all();
        // inicializo los campos de la suscripcion seleccionada
        $this->pago_id          = $pago->id;
        $this->suscripcion_id   = $pago->suscripcion_id;
        $this->monto            = $pago->suscripcion->servicio->precio;
        $this->fecha_pago       = $pago->fecha_pago;
        $this->metodo_pago      = $pago->metodo_pago;
    }
    public function actualizarPago(){
        $this->validate();
        $pago = ModelsPago::findOrFail($this->pago_id);
        $pago->update(
            [
                'suscripcion_id' => $this->suscripcion_id,
                'monto'          => $this->monto,
                'fecha_pago'     => $this->fecha_pago,
                'metodo_pago'    => $this->metodo_pago,
            ]
        );
        session()->flash('message','Pago actualizado con exito');
        $this->dispatch('pago_actualizado',$pago);
    }
    public function render()
    {
        return view('livewire.actualizar.pago');
    }
}
