<?php

namespace App\Livewire\Pages\Admin;

use App\Helpers\AlertHelper;
use App\Models\FacultyModel;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Url;

class Lecturer extends Component
{
    #[Title("Lecturer")]
    public $lecturerId, $nidn, $name, $email, $faculty_id;
    use WithPagination;
    use LivewireAlert;

    #[Url(as: 'lecturer')]
    public $search = '';
    protected $paginationTheme = 'bootstrap';


    public function openModal()
    {
        $this->dispatch('openModal');
    }

    public function closeModal()
    {
        $this->resetFields();
        $this->dispatch('closeModal');
    }

    public function bukaModalDelete()
    {
        $this->dispatch('openModalDelete');
    }
    public function tutupModalDelete()
    {
        $this->resetFields();
        $this->dispatch('closeModalDelete');
    }

    public function resetFields()
    {
        $this->lecturerId = null;
        $this->nidn = null;
        $this->name = null;
        $this->email = null;
        $this->faculty_id = null;
    }

    public function save()
    {
        $this->validate([
            'nidn' => 'required',
            'name' => 'required',
            'email' => 'required',
            'faculty_id' => 'required',
        ]);

        $fields = [
            'nidn' => $this->nidn,
            'name' => $this->name,
            'email' => $this->email,
            'faculty_id' => $this->faculty_id,
        ];

        if ($this->lecturerId) {
            $findData = User::find($this->lecturerId);
            $findData->update($fields);
            AlertHelper::success($this,  'Lecturer has been updated');
        } else {
            $exists = User::where('email', $this->email)->first();
            if (!$exists) {
                $fields['password'] = Hash::make($this->nidn);
                User::create($fields);
                AlertHelper::success($this,  'Lecturer has been created');
            } else {
                AlertHelper::error($this,  'Lecturer has not been created');
            }
        }

        $this->resetFields();
        $this->closeModal();
    }

    public function edit($id)
    {
        $editLecturer = User::find($id);
        $this->lecturerId = $id;
        $this->nidn = $editLecturer->nidn;
        $this->name = $editLecturer->name;
        $this->email = $editLecturer->email;
        $this->faculty_id = $editLecturer->faculty_id;
        $this->openModal();
    }

    public function formDelete($id)
    {
        $formDelete = User::find($id);
        $this->lecturerId = $formDelete->id;
        $this->nidn = $formDelete->nidn;
        $this->bukaModalDelete();
    }

    public function delete()
    {
        $deleteLecturer = User::find($this->lecturerId);
        $deleteLecturer->delete();
        $this->resetFields();
        AlertHelper::success($this,  'Lecturer has been deleted');
        $this->tutupModalDelete();
    }
    public function render()
    {
        $lecturers = User::isLecturer()->paginate(10);
        $faculties = FacultyModel::paginate(10);
        return view('livewire.pages.admin.lecturer', compact('lecturers', 'faculties'));
    }
}
