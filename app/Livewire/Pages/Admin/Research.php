<?php

namespace App\Livewire\Pages\Admin;

use App\Models\AcademicYearModel;
use App\Models\ResearchModel;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Research extends Component
{
    use WithPagination;

    #[Url]
    public $search = '';
    #[Url]
    public $selectFunding = '';
    #[Url]
    public $selectType = '';
    #[Url]
    public $selectSemester = '';
    #[Url]
    public $selectAcademicYear = '';
    #[Title('Riset Masyarakat')]
    public function render()
    {
        $researchLecturer = ResearchModel::query();
        if($this->search){
            $researchLecturer->where('title', 'like', '%' . $this->search . '%');
        }
        if($this->selectFunding){
            $researchLecturer->where('funding', $this->selectFunding);
        }
        if($this->selectType){
            $researchLecturer->where('type_research', $this->selectType);
        }
        if($this->selectSemester){
            $researchLecturer->where('semesters', $this->selectSemester);
        }
        if($this->selectAcademicYear){
            $researchLecturer->whereHas('academicYear', function ($query) {
                $query->where('academic_year', $this->selectAcademicYear);
            });
        }

        $academicYear = AcademicYearModel::get();
        $researchLecturer = $researchLecturer->with('lecturer', 'academicYear')->paginate(10);
        return view('livewire.pages.admin.research',compact('researchLecturer','academicYear'));
    }
}
