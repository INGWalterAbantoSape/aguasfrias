<?php

namespace App\Livewire\Table;

use App\Models\Servicio;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use PDF;
class TableServicio extends Component
{
    use WithPagination;

    public $paginasMax = 10;
    public $fechaInicial = '';
    public $fechaFinal = '';
    public $nombre = '';

    protected $queryString = [
        'fechaInicial' => ['except' => ''],
        'fechaFinal' => ['except' => ''],
        'nombre' => ['except' => ''],
    ];
    #[On('Servicio_creado')]
    public function servicioCreado(){
        $servicios = $this->filtroServicios();
        return view('livewire.table.table-servicio', [
            'servicios' => $servicios
        ]);
    }
    
    #[On('servicio_actualizado')]
    public function render()
    {
        $servicios = $this->filtroServicios();
        return view('livewire.table.table-servicio', [
            'servicios' => $servicios
        ]);
    }

    private function filtroServicios()
    {
        $query = Servicio::query();
        if ($this->fechaInicial) {
            $query->whereDate('created_at', '>=', $this->fechaInicial);
        }
        if ($this->fechaFinal) {
            $query->whereDate('created_at', '<=', $this->fechaFinal);
        }

        if ($this->nombre) {
            $query->where('nombre', 'like', '%' . $this->nombre . '%');
        }
        $query->orderBy('id', 'desc');
        return $query->paginate($this->paginasMax);
    }
    public function pdf()
    {
        // Datos que pasarás a la vista PDF
        $productos = Servicio::all();
        $data = ['productos' => $productos];
        // Cargar la vista y pasar los datos
        $pdf = PDF::loadView('pdf.producto', $data)->setPaper('a4', 'portrait');
        // Retornar el PDF como descarga
        $date = now()->format('Y-m-d_H-i-s');
        // Retornar el PDF como descarga
        return response()->streamDownload(
            fn () => print($pdf->output()),
            "productos-{$date}.pdf"
        );
    }
}
