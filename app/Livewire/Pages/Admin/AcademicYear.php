<?php

namespace App\Livewire\Pages\Admin;

use App\Helpers\AlertHelper;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Helpers\SearchHelper;
use Livewire\Attributes\Title;
use App\Models\AcademicYearModel;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AcademicYear extends Component
{
    #[Title("Academic Year")]
    public $academicYearId, $academic_year;
    use WithPagination;
    use LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public function updateSearch()
    {
        $this->resetPage();
    }

    #[Url(as: 'academic-year')]
    public $search = '';


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
        $this->academicYearId = null;
        $this->academic_year = null;

    }

    public function save()
    {
        $this->validate([
            'academic_year' => 'required|unique:academic_year,academic_year',
        ], [
            'academic_year.required' => 'Academic Year is required',
            'academic_year.unique' => 'Academic Year already exists',
        ]);


        $fields = [
            'academic_year' => $this->academic_year,
        ];

        if ($this->academicYearId) {
            $academicYear = AcademicYearModel::find($this->academicYearId);
            $academicYear->update($fields);
            AlertHelper::success($this,  'Academic Year has been updated');
        } else {
            $exists = AcademicYearModel::where('academic_year', $this->academic_year)->first();
            if (!$exists) {
                AcademicYearModel::create($fields);
                AlertHelper::success($this,  'Academic Year has been created');
            } else {
                AlertHelper::error($this,  'Academic Year has not been created');
            }
        }

        $this->resetFields();
        $this->closeModal();
    }

    public function edit($id)
    {
        $academicYear = AcademicYearModel::find($id);
        $this->academicYearId = $id;
        $this->academic_year = $academicYear->academic_year;


        $this->openModal();
    }

    public function formDelete($id)
    {
        $formDelete = AcademicYearModel::find($id);
        $this->academicYearId = $formDelete->id;
        $this->bukaModalDelete();
    }

    public function delete()
    {
        $academicYear = AcademicYearModel::find($this->academicYearId);
        $academicYear->delete();
        $this->resetFields();
        AlertHelper::success($this,  'Academic Year has been deleted');
        $this->tutupModalDelete();
    }

    public function render()
    {
        $academicYears = SearchHelper::search(
            new AcademicYearModel(),
            trim($this->search),
            ['academic_year']
        );
        return view('livewire.pages.admin.academic-year', compact('academicYears'));
    }
}
