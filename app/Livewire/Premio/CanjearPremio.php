<?php

namespace App\Livewire\Premio;

use App\Models\Cliente;
use App\Models\Premio;
use Livewire\Component;

class CanjearPremio extends Component
{
    
    public $clientes;
    public $cliente_id;
    public $premios;
    public $puntos_actuales;
    public $premio_id;

    protected $rules = [
        'cliente_id' => 'required|exists:clientes,id',
        'premio_id' => 'required|exists:premios,id',
    ];

    public function mount()
    {
        $this->clientes = Cliente::all();
        $this->premios = Premio::all();
        $this->cliente_id = 1;
        // $this->puntos_actuales =s;
    }
    public function updatedClienteId($cliente_id)
    {
        if ($cliente_id) {
            $this->puntos_actuales = Cliente::find($cliente_id)->puntos;
        } else {
            $this->puntos_actuales = 0;
        }
    }
    public function canjear()
    {
        $cliente = Cliente::find($this->cliente_id);
        $premio = Premio::find($this->premio_id);
        // $this->puntos_actuales = $cliente->puntos;
        if ($cliente->puntos >= $premio->puntos_requeridos) {
            $cliente->puntos -= $premio->puntos_requeridos;
            $cliente->save();

            session()->flash('message', "¡Premio '{$premio->nombre}' canjeado exitosamente!");
        } else {
            session()->flash('error', 'No tienes suficientes puntos para canjear este premio.');
        }

        $this->puntos_actuales = $cliente->puntos;
    }
    public function render()
    {
        return view('livewire.premio.canjear-premio');
    }
}
