<?php

namespace App\Livewire\Registro;

use App\Models\Cliente;
use App\Models\Pago;
use App\Models\Servicio;
use App\Models\Suscripcion as ModelsSuscripcion;
use Carbon\Carbon;
use Livewire\Attributes\Rule;
use Livewire\Component;
// use Livewire\Attributes\Validate;

class Suscripcion extends Component
{
    // datos de los cliente
    public $clientes;
    public $servicios;
    public $cliente_id;
    public $servicio_id;
    public $fecha_inicio;
    public $fecha_fin;

    // roles para cada atributo
    protected function rules()
    {
        return [
            'cliente_id' => 'required',
            'servicio_id' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ];
    }
    // mensajes personalizados
    protected $messages = [
        'cliente_id.required' => 'El cliente es requerido',
        'servicio_id.required' => 'El servicio es requerido',
        'fecha_inicio.required' => 'La fecha de inicio es requerida',
        'fecha_fin.required' => 'La fecha de fin es requerida',
    ];
    // obtengo los datos antes de cargar el componente
    public function mount(){
        $this->clientes = Cliente::all();
        $this->servicios = Servicio::all();
    }
    // funcion para crear 
    public function agregar(){
        $this->validate();
        $suscripcion = ModelsSuscripcion::create([
            'cliente_id' => $this->cliente_id,
            'servicio_id' => $this->servicio_id,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'estado' => 'activa',
        ]);
        $this->generarCuotas($suscripcion);
        $cliente = Cliente::find($this->cliente_id);
        $cliente->puntos += $this->calcularPuntos();
        $cliente->save();
        session()->flash('message', 'Suscripción registrada exitosamente.');
        $this->dispatch('Suscripcion_creado');
        $this->dispatch('flashMessage');
        $this->reset(['cliente_id', 'servicio_id', 'fecha_inicio', 'fecha_fin']);
    }
    private function generarCuotas(ModelsSuscripcion $suscripcion){
        $servicio = $suscripcion->servicio;
        $fechaInicio = Carbon::parse($suscripcion->fecha_inicio);
        $fechaFin = Carbon::parse($suscripcion->fecha_fin);
        $monto = 0;

        while ($fechaInicio->lte($fechaFin)) {
            Pago::create([
                'suscripcion_id' => $suscripcion->id,
                'monto' => $monto,
                'fecha_pago' => $fechaInicio->copy(),
                'metodo_pago' => 'pendiente', // Inicialmente pendiente
            ]);

            switch ($servicio->tipo) {
                case 'mensual':
                    $fechaInicio->addMonth();
                    break;
                case 'quincenal':
                    $fechaInicio->addWeeks(2);
                    break;
                case 'anual':
                    $fechaInicio->addYear();
                    break;
            }
        }
    }
    private function calcularPuntos()
    {
        return 50; 
    }
    public function render()
    {
        return view('livewire.registro.suscripcion');
    }
}
