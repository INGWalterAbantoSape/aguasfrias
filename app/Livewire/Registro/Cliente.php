<?php

namespace App\Livewire\Registro;

use App\Models\Cliente as ModelsCliente;
use Livewire\Component;

class Cliente extends Component
{
    public $nombre = '';
    public $email = '';
    public $telefono = '';
    public $direccion = '';
    protected $rules = [
        'nombre' => 'required|min:3',
        'email' => 'required|email',
        'telefono' => 'required|min:9|max:9',
        'direccion' => 'required|min:5',
    ];

    protected $messages = [
        'nombre.required' => 'El nombre es requerido.',
        'nombre.min' => 'El nombre debe tener al menos 3 letras.',
        'email.required' => 'El email es requerido.',
        'email.email' => 'El email debe ser una dirección válida.',
        'telefono.required' => 'El teléfono es requerido.',
        'telefono.min' => 'El teléfono debe tener 9 caracteres.',
        'telefono.max' => 'El teléfono debe tener 9 caracteres',
        'direccion.required' => 'La dirección es requerida.',
        'direccion.min' => 'La dirección debe tener al menos 5 caracteres.',
    ];

    public function crearCliente(){
        $this->validate(); 
        $cliente = ModelsCliente::create(
            $this->only(['nombre', 'email','telefono','direccion'])
        );
        $this->reset(['nombre', 'email','telefono','direccion']);
        session()->flash('message', 'Cliente creado exitosamente.');
        $this->dispatch('cliente_creado',$cliente);
    }
    public function render()
    {
        return view('livewire.registro.cliente');
    }
}
