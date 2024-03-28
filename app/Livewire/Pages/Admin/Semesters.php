<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SemesterModel;
use Livewire\Attributes\Title;
use App\Http\Resources\SemestersResource;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Semesters extends Component
{
    #[Title('Semesters')]
    public $semesterId, $name;
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
        $this->semesterId = null;
        $this->name = null;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
        ]);

        if ($this->semesterId) {
            $semester = SemesterModel::find($this->semesterId);
            if ($semester->name !== $this->name) {
                $semester->name = $this->name;
                $this->notification('success', 'Academic Year has been updated');
                $semester->save();
            }
        } else {
            $exists = SemesterModel::where('name', $this->semesterId)->first();
            if (!$exists) {
                SemesterModel::create([
                    'name' => $this->name,
                ]);
                $this->notification('success', 'Academic Year has been created');
            } else {
                $this->notification('error', 'Academic Year already exists');
            }
        }

        $this->resetFields();
        $this->closeModal();
    }

    public function edit($id)
    {
        $academicYear = SemesterModel::find($id);
        $this->semesterId = $id;
        $this->name = $academicYear->name;
        $this->openModal();
    }

    public function formDelete($id)
    {
        $formDelete = SemesterModel::find($id);
        $this->semesterId = $formDelete->id;
        $this->name = $formDelete->name;
        $this->bukaModalDelete();
    }

    public function delete()
    {
        $academicYear = SemesterModel::find($this->semesterId);
        $academicYear->delete();
        $this->resetFields();
        $this->notification('success', 'Academic Year has been deleted');
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
        $semesters = SemesterModel::with('academicYear')->get();
        return view('livewire.pages.admin.semesters', compact('semesters'));
    }
}
