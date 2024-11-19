<?php

namespace App\Livewire\Actualizar;

use App\Models\Cliente as ModelsCliente;
use Livewire\Component;

class Cliente extends Component
{
    public $clienteId;
    public $nombre = '';
    public $email = '';
    public $telefono = '';
    public $direccion = '';
    public $estado = '';
    protected $rules = [
        'nombre' => 'required|min:3',
        'email' => 'required|email',
        'telefono' => 'required|min:9|max:15',
        'direccion' => 'required|min:5',
    ];
    protected $messages = [
        'nombre.required' => 'El nombre es requerido.',
        'nombre.min' => 'El nombre debe tener al menos 3 letras.',
        'email.required' => 'El email es requerido.',
        'email.email' => 'El email debe ser una dirección válida.',
        'telefono.required' => 'El teléfono es requerido.',
        'telefono.min' => 'El teléfono debe tener al menos 10 caracteres.',
        'telefono.max' => 'El teléfono no puede tener más de 15 caracteres.',
        'direccion.required' => 'La dirección es requerida.',
        'direccion.min' => 'La dirección debe tener al menos 5 caracteres.',
        'estado.required' => 'el estado es requerido.',
    ];
    // es como el constructor 
    public function mount($clienteId)
    {
        $cliente = ModelsCliente::findOrFail($clienteId);
        $this->clienteId = $cliente->id;
        $this->nombre = $cliente->nombre;
        $this->email = $cliente->email;
        $this->telefono = $cliente->telefono;
        $this->direccion = $cliente->direccion;
        $this->estado = $cliente->estado;
    }
    public function actualizarCliente()
    {
        $this->validate();
        $cliente = ModelsCliente::findOrFail($this->clienteId);
        $cliente->update([
            'nombre' => $this->nombre,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'estado' => $this->estado,
        ]);

        session()->flash('message', 'Cliente actualizado exitosamente.');
        $this->dispatch('cliente_actualizado', $cliente);
    }
    public function render()
    {
        return view('livewire.actualizar.cliente');
    }
}
