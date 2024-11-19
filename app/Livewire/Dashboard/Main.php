<?php

namespace App\Livewire\Dashboard;
use Livewire\Attributes\On; 
use Livewire\Component;

class Main extends Component
{
    public $pagina = 'home';
    protected $listeners = ['changePage'];
    #[On('changePage')]
    public function changePage($pagina)
    {
        $this->pagina = $pagina;
        $this->dispatch('contentChanged');
    }
    public function render()
    {
        return view('livewire.dashboard.main')->with('pagina', $this->pagina);
    }
}
