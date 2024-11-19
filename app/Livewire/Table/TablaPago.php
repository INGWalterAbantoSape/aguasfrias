<?php

namespace App\Livewire\Table;

use App\Models\Pago;
use PDF;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TablaPago extends Component
{
    use WithPagination;
    public $paginasMax = 10;
    public $fechaInicial;
    public $fechaFinal;
    public $nombre;
    public function mount()
    {
        $this->fechaInicial = '';
        $this->fechaFinal = '';
        $this->nombre = '';
    }
    #[On('pago_creado')]
    public function render()
    {
        $pagos = $this->filtroPago();
        return view('livewire.table.tabla-pago', [
            'pagos' => $pagos
        ]);
    }
    #[On('pago_actualizado')]
    public function actualizarTabla()
    {
        $pagos = $this->filtroPago();
        return view('livewire.table.tabla-pago', [
            'pagos' => $pagos
        ]);
    }
    public function filtroPago()
    {
        $query = Pago::with('suscripcion');
        if ($this->fechaInicial) {
            $query->whereDate('created_at', '>=', $this->fechaInicial);
        }
        if ($this->fechaFinal) {
            $query->whereDate('created_at', '<=', $this->fechaFinal);
        }
        if ($this->nombre) {
            $query->whereHas('suscripcion.cliente', function ($query) {
                $query->where('nombre', 'like', '%' . $this->nombre . '%');
            });
        }
        $query->orderBy('id', 'desc');
        return $query->paginate($this->paginasMax);
    }
    public function eliminar(Pago $suscripcion)
    {
        $suscripcion->delete();
        session()->flash('message', 'Pago eliminado exitosamente.');
        $this->dispatch('flashMessage');
    }
    public function pdf(Pago $pago)
    {
        // Datos que pasarás a la vista PDF
        $data = ['pago' => $pago];
        $options = [
            'page-size' => '80mmx80mm',  // Tamaño de página A4 (o personalizado como '21cmx29.7cm')
            'orientation' => 'portrait',  // Orientación del documento ('portrait' o 'landscape')
        ];
        // Cargar la vista y pasar los datos
        $pdf = PDF::loadView('pdf.pago', $data)->setPaper('a6', 'portrait');

        // Retornar el PDF como descarga
        return response()->streamDownload(
            fn () => print($pdf->output()),
            "pago-{$pago->id}.pdf"
        );
    }
}
