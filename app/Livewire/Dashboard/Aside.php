<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class Aside extends Component
{
    public $isOpen = ''; 

    public function changePage($page)
    {
        $this->dispatch('changePage', pagina: $page);
    }
    public function toggleDropdown($menu)
    {
        $this->isOpen = $this->isOpen === $menu ? '' : $menu;
    }
    public function render()
    {
        return view('livewire.dashboard.aside');
    }
}
