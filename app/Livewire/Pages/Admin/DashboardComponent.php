<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use Livewire\Attributes\Title;

class DashboardComponent extends Component
{
    #[Title("Dashboard")]
    public function render()
    {
        return view('livewire.pages.admin.dashboard-component');
    }
}
