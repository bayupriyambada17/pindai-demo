<?php

namespace App\Livewire\Pages\Admin;

use App\Models\ResearchModel;
use Livewire\Attributes\Title;
use Livewire\Component;

class Research extends Component
{
    #[Title('Riset Masyarakat')]
    public function render()
    {
        $research = ResearchModel::get()->toArray();
        return view('livewire.pages.admin.research');
    }
}
