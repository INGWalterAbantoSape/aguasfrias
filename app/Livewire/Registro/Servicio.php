<?php

namespace App\Livewire\Registro;

use App\Models\Servicio as ModelsServicio;
use Livewire\Component;

class Servicio extends Component
{
    public $nombre;
    public $descripcion;
    public $precio;
    public $tipo;
    protected $rules = [
        'nombre' => 'required|min:3',
        'descripcion' => 'required|min:3',
        'precio' => 'required',
        'tipo'  => 'required',
    ];
    protected $messages = [
        'nombre.required' => 'El nombre es requerido.',
        'nombre.min' => 'El nombre debe tener al menos 3 letras.',
        'descripcion.required' => 'El descripcion es requerido.',
        'descripcion.min' => 'El descripcion debe tener al menos 3 letras.',
        'precio.required' => 'El precio es requerido.',
        'tipo.required' => 'el tipo es requerido'
    ];
    public function CrearServicio(){
        $this->validate(); 
        $servicio = ModelsServicio::create(
            $this->only(['nombre', 'descripcion','precio','tipo'])
        );
        $this->reset(['nombre', 'descripcion','precio','tipo']);
        session()->flash('message', 'Servicio creado exitosamente.');
        $this->dispatch('Servicio_creado',$servicio);
    }
    public function render()
    {
        return view('livewire.registro.servicio');
    }
}
