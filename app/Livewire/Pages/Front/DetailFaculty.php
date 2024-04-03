<?php

namespace App\Livewire\Pages\Front;

use Livewire\Component;
use App\Models\FacultyModel;
use App\Models\ResearchModel;
use Livewire\Attributes\Title;

class DetailFaculty extends Component
{
    public $titlePage;
    public $facultyId;
    // public $faculty;
    public $data = [];

    public function mount($id)
    {
        $this->data['faculty'] = FacultyModel::with('research.lecturer:id,name,faculty_id')
            ->find(decrypt($id));
        // dd($data);
    }
    public function render()
    {
        return view('livewire.pages.front.detail-faculty')->layout('components.layouts.front');
    }
}
