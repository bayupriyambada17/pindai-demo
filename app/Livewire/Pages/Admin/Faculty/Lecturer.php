<?php

namespace App\Livewire\Pages\Admin\Faculty;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Lecturer extends Component
{
    #[Title("Faculty Lecturer")]
    public $facultyId;
    use WithPagination;

    #[Url(as: 'lecturer')]
    public $search = '';


    public function mount($id)
    {
        $this->facultyId = decrypt($id);
    }
    public function render()
    {
        $lecturers = User::isLecturer()->where('faculty_id', $this->facultyId)
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(10);
        return view('livewire.pages.admin.faculty.lecturer', [
            'lecturers' => $lecturers
        ]);
    }
}
