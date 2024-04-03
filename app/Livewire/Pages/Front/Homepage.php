<?php

namespace App\Livewire\Pages\Front;

use App\Models\FacultyModel;
use Livewire\Attributes\Title;
use Livewire\Component;

class Homepage extends Component
{
    #[Title('Homepage')]
    public function render()
    {
        // $attentionFields = [];

        $data['faculties'] = FacultyModel::orderBy('created_at', 'desc')->get();
        return view('livewire.pages.front.homepage', $data)->layout('components.layouts.front');
    }
}
