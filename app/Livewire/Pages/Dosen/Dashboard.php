<?php

namespace App\Livewire\Pages\Dosen;

use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Title('Dashboard')]
    public function render()
    {
        return view('livewire.pages.dosen.dashboard');
    }
}
