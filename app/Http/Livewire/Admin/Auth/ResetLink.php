<?php

namespace App\Http\Livewire\Admin\Auth;

use Livewire\Component;

class ResetLink extends Component
{
    public function render()
    {
        return view('livewire.admin.auth.reset-link')
                ->layout('layouts.guest');
    }
}
