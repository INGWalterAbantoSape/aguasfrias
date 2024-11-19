<?php

namespace App\Livewire\Table;

use App\Models\Suscripcion;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TableSuscripciones extends Component
{
    use WithPagination;
    public $paginasMax = 10;
    public $fechaInicial;
    public $fechaFinal;

    public function mount(){
        $this->fechaInicial='';
        $this->fechaFinal='';
    }
    #[On('Suscripcion_creado')]
    public function render()
    {
        $suscripciones = $this->filtro();
        return view('livewire.table.table-suscripciones',[
            'suscripciones' => $suscripciones
        ]);
    }
    public function filtro(){
        $query = Suscripcion::with('cliente','servicio','pagos');
        if ($this->fechaInicial) {
            $query->whereDate('created_at', '>=', $this->fechaInicial);
        }
        if ($this->fechaFinal) {
            $query->whereDate('created_at', '<=', $this->fechaFinal);
        }
        $query->orderBy('id', 'desc');
        return $query->paginate($this->paginasMax);
    }
    public function eliminar(Suscripcion $suscripcion){
        $suscripcion->delete();
        session()->flash('message', 'Suscripción Eliminada exitosamente.');
        $this->dispatch('flashMessage');
    }
}
