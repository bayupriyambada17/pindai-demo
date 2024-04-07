<?php

namespace App\Livewire\Pages\Front;

use App\Models\AcademicYearModel;
use Livewire\Component;
use App\Models\FacultyModel;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;

class DetailFaculty extends Component
{
    public $titlePage;
    public $facultyId;
    public $faculty;
    #[Url(as: 'selectAcademicYearId')]
    public $selectAcademicYearId;
    #[Url(as: 'selectSemesters')]
    public $selectSemesters = '';
    #[Url(as: 'selectTypeResearch')]
    public $selectTypeResearch = '';

    #[Title("Detail Fakultas")]

    public function mount($id)
    {
        $this->facultyId = decrypt($id);

    }
    public function render()
    {
        $query = FacultyModel::query()
            ->with(['research' => function ($query) {
                $query->with(['lecturer:id,name,faculty_id', 'academicYear']);
                if ($this->selectSemesters) {
                    $query->where('semesters', $this->selectSemesters);
                }
                if ($this->selectAcademicYearId) {
                    $query->where('academic_year_id', $this->selectAcademicYearId);
                }
                if ($this->selectTypeResearch) {
                    $query->where('type_research', $this->selectTypeResearch);
                }
            }])
            ->find($this->facultyId)
            ->loadMissing(['research' => function ($query) {
                $query->withDefault();
            }]);
        $countResearch = $query->research->count();

        $devotion = $query->research->where('type_research', 'devotion')->count();
        $study = $query->research->where('type_research', 'study')->count();

        $facultyTarget = (int) $query->faculty_target;

        $percentageDevotion = round($devotion / $facultyTarget * 100, 0);
        $percentageStudy = round($study / $facultyTarget * 100, 0);

        function determineColor($percentage)
        {
            if ($percentage >= 75) {
                return 'green'; // Green
            } elseif ($percentage >= 25) {
                return 'yellow'; // Yellow
            } else if ($percentage < 25) {
                return 'red'; // Red
            }
        }

        $data = [
            'countResearch' => $countResearch,
            'totalDevotion' => $devotion,
            'totalStudy' => $study,
            'devotion' => [
                'percentage' => $percentageDevotion,
                'color' => determineColor($percentageDevotion),
            ],
            'study' => [
                'percentage' => $percentageStudy,
                'color' => determineColor($percentageStudy),
            ],
        ];
        $this->faculty = $query;

        $academicYears = AcademicYearModel::get();
        return view('livewire.pages.front.detail-faculty', [
            'academicYears' => $academicYears,
            'facultyId' => $this->faculty,
            'data' => $data
        ])->layout('components.layouts.front');
    }
}
