<?php

namespace App\Livewire\Dashboard;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public function logout()
    {
        Auth::logout();
        return redirect('/login');  // Redirigir a la página de login
    }
    public function render()
    {
        return view(
            'livewire.dashboard.header',
            [
                'user' => Auth::user(),
            ]
        );
    }
}
