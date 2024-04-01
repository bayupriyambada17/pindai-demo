<?php

namespace App\Livewire\Pages\Admin\Faculty;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

class Lecturer extends Component
{
    #[Title("Faculty Lecturer")]
    public $facultyId;
    use WithPagination;

    public function mount($id)
    {
        $this->facultyId = decrypt($id);
    }
    public function render()
    {
        $lecturers = User::where('role', 'lecturer')->where('faculty_id', $this->facultyId)->paginate(10);
        return view('livewire.pages.admin.faculty.lecturer', [
            'lecturers' => $lecturers
        ]);
    }
}
