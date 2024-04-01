<?php

namespace App\Livewire\Pages\Admin;

use App\Models\FacultyModel;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Faculty extends Component
{
    #[Title("Faculty")]
    public $facultyId, $faculty_name, $faculty_code, $faculty_target;
    use WithPagination;
    use LivewireAlert;


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
        $this->facultyId = null;
        $this->faculty_name = null;
        $this->faculty_code = null;
        $this->faculty_target = null;
    }

    public function save()
    {
        $this->validate([
            'faculty_name' => 'required',
            'faculty_code' => 'required',
            'faculty_target' => 'required',
        ]);

        $fields = [
            'faculty_name' => $this->faculty_name,
            'faculty_code' => $this->faculty_code,
            'faculty_target' => $this->faculty_target,
        ];

        if ($this->facultyId) {
            $findData = FacultyModel::find($this->facultyId);
            $findData->update($fields);
            $this->notification('success', 'Faculty has been updated');
        } else {
            $exists = FacultyModel::where('faculty_code', $this->faculty_code)->first();
            if (!$exists) {
                FacultyModel::create($fields);
                $this->notification('success', 'Faculty has been created');
            } else {
                $this->notification('error', 'Faculty has not been created');
            }
        }

        $this->resetFields();
        $this->closeModal();
    }

    public function edit($id)
    {
        $academicYear = FacultyModel::find($id);
        $this->facultyId = $id;
        $this->faculty_name = $academicYear->faculty_name;
        $this->faculty_code = $academicYear->faculty_code;
        $this->faculty_target = $academicYear->faculty_target;
        $this->openModal();
    }

    public function formDelete($id)
    {
        $formDelete = FacultyModel::find($id);
        $this->facultyId = $formDelete->id;
        $this->faculty_name = $formDelete->faculty_name;
        $this->bukaModalDelete();
    }

    public function delete()
    {
        $academicYear = FacultyModel::find($this->facultyId);
        $academicYear->delete();
        $this->resetFields();
        $this->notification('success', 'Faculty has been deleted');
        $this->tutupModalDelete();
    }

    protected function notification($typeAlert, $message)
    {
        $this->alert($typeAlert, $message, [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);

        return [$typeAlert, $message];
    }
    public function render()
    {
        $faculties = FacultyModel::paginate(10);
        return view('livewire.pages.admin.faculty', compact('faculties'));
    }
}
