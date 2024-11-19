<?php

namespace App\Livewire\Table;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use PDF;

class TablaCliente extends Component
{
    use WithPagination;

    public $paginasMax = 10;
    public $fechaInicial = '';
    public $fechaFinal = '';
    public $nombre = '';
    public $telefono = '';

    protected $queryString = [
        'fechaInicial' => ['except' => ''],
        'fechaFinal' => ['except' => ''],
        'nombre' => ['except' => ''],
        'telefono' => ['except' => ''],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'fechaInicial' => 'nullable|date',
            'fechaFinal' => 'nullable|date',
            'nombre' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
        ]);

        $this->resetPage();
    }

    #[On('cliente_creado')]
    public function hola($cliente = null)
    {
        $cliente = $this->filtroClientes();
        return view('livewire.table.tabla-cliente', [
            'clientes' => $cliente
        ]);
        // dd($cliente);
    }
    #[On('cliente_actualizado')]
    public function render()
    {
        $clientes = $this->filtroClientes();
        return view('livewire.table.tabla-cliente', [
            'clientes' => $clientes
        ]);
    }
    // #[On('modelDeleted')]
    // public function cerrarModalEliminar(){

    // }
    // #[On('modelDeleted')]
    private function filtroClientes()
    {
        $query = Cliente::query();

        if ($this->fechaInicial) {
            $query->whereDate('created_at', '>=', $this->fechaInicial);
        }

        if ($this->fechaFinal) {
            $query->whereDate('created_at', '<=', $this->fechaFinal);
        }

        if ($this->nombre) {
            $query->where('nombre', 'like', '%' . $this->nombre . '%');
        }

        if ($this->telefono) {
            $query->where('telefono', 'like', '%' . $this->telefono . '%');
        }
        $query->orderBy('id', 'desc');
        return $query->paginate($this->paginasMax);
    }
    public function pdf()
    {
        // Datos que pasarás a la vista PDF
        $clientes = Cliente::all();
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
