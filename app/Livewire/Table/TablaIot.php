<?php

namespace App\Livewire\Table;

use App\Models\Riego;
use PDF;
use Livewire\Component;

class TablaIot extends Component
{
    public $paginasMax = 10;
    public $fechaInicial = '';
    public $fechaFinal = '';
    public function render()
    {
        $datos = $this->filtroRiego();
        return view('livewire.table.tabla-iot',[
            'datos' =>$datos
        ]);
    }
    private function filtroRiego()
    {
        $query = Riego::query();

        if ($this->fechaInicial) {
            $query->whereDate('created_at', '>=', $this->fechaInicial);
        }

        if ($this->fechaFinal) {
            $query->whereDate('created_at', '<=', $this->fechaFinal);
        }
        $query->orderBy('id', 'desc');
        return $query->paginate($this->paginasMax);
    }
    public function pdf()
    {
        // Datos que pasarás a la vista PDF
        $clientes = Riego::all();
        $data = ['clientes' => $clientes];
        // Cargar la vista y pasar los datos
        $pdf = PDF::loadView('pdf.cliente', $data)->setPaper('a4', 'portrait');
        // Retornar el PDF como descarga
        $date = now()->format('Y-m-d_H-i-s');
        // Retornar el PDF como descarga
        return response()->streamDownload(
            fn () => print($pdf->output()),
            "clientes-{$date}.pdf"
        );
    }
}
