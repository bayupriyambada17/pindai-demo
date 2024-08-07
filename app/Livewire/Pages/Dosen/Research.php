<?php

namespace App\Livewire\Pages\Dosen;

use App\Helpers\AlertHelper;
use App\Models\AcademicYearModel;
use App\Models\ResearchModel;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Url;

class Research extends Component
{
    #[Title("Riset Masyarakat")]
    public $researchId, $title, $description, $lecturer_id, $funding, $type_research, $academic_year_id, $semesters;
    use WithPagination;
    use LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    #[Url(as: 'search')]
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

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
        $this->researchId = null;
        $this->title = null;
        $this->description = null;
        $this->lecturer_id = null;
        $this->funding = null;
        $this->type_research = null;
        $this->academic_year_id = null;
        $this->semesters = null;
    }

    public function save()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'nullable',
            'type_research' => 'required|in:penelitian,pengabdian',
            'funding' => 'required|in:mandiri,hibah',
            'academic_year_id' => 'required',
            'semesters' => 'required|in:ganjil,genap'

        ], [
            'required' => ':attribute wajib diisi',
            'in' => ':attribute harus dipilih'
        ]);

        $fields = [
            'title' => $this->title,
            'description' => $this->description,
            'lecturer_id' => auth()->user()->id,
            'type_research' => $this->type_research,
            'funding' => $this->funding,
            'semesters' => $this->semesters,
            'academic_year_id' => $this->academic_year_id,
        ];

        if ($this->researchId) {
            $findData = ResearchModel::find($this->researchId);
            $findData->update($fields);
            AlertHelper::success($this,  'Research has been updated');
        } else {
            ResearchModel::create($fields);
            AlertHelper::success($this,  'Research has been created');
        }

        $this->resetFields();
        $this->closeModal();
    }

    public function edit($id)
    {
        $viewEdit = ResearchModel::where('lecturer_id', auth()->user()->id)->find($id);
        $this->researchId = $id;
        $this->title = $viewEdit->title;
        $this->description = $viewEdit->description;
        $this->funding = $viewEdit->funding;
        $this->type_research = $viewEdit->type_research;
        $this->academic_year_id = $viewEdit->academic_year_id;
        $this->semesters = $viewEdit->semesters;
        $this->openModal();
    }

    public function formDelete($id)
    {
        $formDelete = ResearchModel::where('lecturer_id', auth()->user()->id)->find($id);
        $this->researchId = $formDelete->id;
        $this->title = $formDelete->title;
        $this->bukaModalDelete();
    }

    public function delete()
    {
        $academicYear = ResearchModel::find($this->researchId);
        $academicYear->delete();
        $this->resetFields();
        AlertHelper::success($this,  'Research has been deleted');
        $this->tutupModalDelete();
    }

    public function render()
    {
        $researchByDosen = ResearchModel::where('lecturer_id', auth()->user()->id)->with([
            'lecturer', 'academicYear'
        ])
            ->when($this->search, function ($query) {
                return $query->where(function ($query) {
                    $query->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%')
                        ->orWhere('funding', 'like', '%' . $this->search . '%')
                        ->orWhere('type_research', 'like', '%' . $this->search . '%')
                        ->orWhere('semesters', 'like', '%' . $this->search . '%');
                });
            })
            ->paginate(10);
        $academicYears = AcademicYearModel::get();
        return view('livewire.pages.dosen.research', compact('researchByDosen', 'academicYears'));
    }
}
