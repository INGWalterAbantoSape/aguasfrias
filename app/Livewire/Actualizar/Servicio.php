<?php

namespace App\Livewire\Actualizar;

use App\Models\Servicio as ModelsServicio;
use Livewire\Component;

class Servicio extends Component
{
    public $servicioId;
    public $nombre;
    public $descripcion;
    public $precio;
    public $estado;
    protected $rules =[
        'nombre'        => 'required|min:5',
        'descripcion'   => 'required|min:5',
        'precio'        => 'required',
        'estado'        => 'required',
    ];
    protected $messages = [
        'nombre.required'       => 'El nombre es requerido.',
        'nombre.min'            => 'El nombre debe tener al menos 3 letras.',
        'descripcion.required'  => 'El descripcion es requerido.',
        'descripcion.min'       => 'la descripcion debe ser menor a 5.',
        'precio.required'       => 'El precio es requerido.',
        'estado.required'       => 'El estado es requerido.',
    ];
    public function mount($servicioId)
    {
        $servicio = ModelsServicio::findOrFail($servicioId);
        $this->servicioId = $servicio->id;
        $this->nombre = $servicio->nombre;
        $this->descripcion = $servicio->descripcion;
        $this->precio = $servicio->precio;
        $this->estado = $servicio->estado;
    }
    public function actualizarServicio(){
        $this->validate();
        $servicio = ModelsServicio::findOrFail($this->servicioId);
        $servicio->update([
            'nombre'        => $this->nombre,
            'descripcion'   => $this->descripcion,
            'precio'        => $this->precio,
            'estado'        => $this->estado,
        ]);
        session()->flash('message','servicio actualizado exitosamente');
        $this->dispatch('servicio_actualizado',$servicio);
    }
    public function render()
    {
        return view('livewire.actualizar.servicio');
    }
}
