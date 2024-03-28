<?php

namespace App\Livewire\Pages\Admin;

use App\Models\AcademicYearModel;
use App\Models\TahunAkademik;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

class AcademicYear extends Component
{
    #[Title("Academic Year")]
    public $academicYearId, $tahun_akademik, $periode_ganjil_start, $periode_ganjil_end, $periode_genap_start, $periode_genap_end;
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
        $this->academicYearId = null;
        $this->tahun_akademik = null;
        $this->periode_ganjil_start = null;
        $this->periode_ganjil_end = null;
        $this->periode_genap_start = null;
        $this->periode_genap_end = null;
    }

    public function save()
    {
        $this->validate([
            'tahun_akademik' => 'required',
            'periode_ganjil_start' => 'required',
            'periode_ganjil_end' => 'required',
            'periode_genap_start' => 'required',
            'periode_genap_end' => 'required'
        ]);

        if ($this->academicYearId) {
            $academicYear = TahunAkademik::find($this->academicYearId);
            $academicYear->update([
                'tahun_akademik' => $this->tahun_akademik,
                'periode_ganjil_start' => Date('Y-m-d', strtotime($this->periode_ganjil_start)),
                'periode_ganjil_end' => Date('Y-m-d', strtotime($this->periode_ganjil_end)),
                'periode_genap_start' => Date('Y-m-d', strtotime($this->periode_genap_start)),
                'periode_genap_end' => Date('Y-m-d', strtotime($this->periode_genap_end))
            ]);
            $this->notification('success', 'Academic Year has been updated');
        } else {
            $exists = TahunAkademik::where('tahun_akademik', $this->tahun_akademik)->first();
            if (!$exists) {
                TahunAkademik::create([
                    'tahun_akademik' => $this->tahun_akademik,
                    'periode_ganjil_start' => Date('Y-m-d', strtotime($this->periode_ganjil_start)),
                    'periode_ganjil_end' => Date('Y-m-d', strtotime($this->periode_ganjil_end)),
                    'periode_genap_start' => Date('Y-m-d', strtotime($this->periode_genap_start)),
                    'periode_genap_end' => Date('Y-m-d', strtotime($this->periode_genap_end))
                ]);
                $this->notification('success', 'Academic Year has been created');
            } else {
                $this->notification('error', 'Academic Year has not been created');
            }
        }

        $this->resetFields();
        $this->closeModal();
    }

    public function edit($id)
    {
        $academicYear = TahunAkademik::find($id);
        $this->academicYearId = $id;
        $this->tahun_akademik = $academicYear->tahun_akademik;
        $this->periode_ganjil_start = $academicYear->periode_ganjil_start;
        $this->periode_ganjil_end = $academicYear->periode_ganjil_end;
        $this->periode_genap_start = $academicYear->periode_genap_start;
        $this->periode_genap_end = $academicYear->periode_genap_end;

        $this->openModal();
    }

    public function formDelete($id)
    {
        $formDelete = TahunAkademik::find($id);
        $this->academicYearId = $formDelete->id;
        $this->tahun_akademik = $formDelete->tahun_akademik;
        $this->bukaModalDelete();
    }

    public function delete()
    {
        $academicYear = TahunAkademik::find($this->academicYearId);
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
        $academicYears = TahunAkademik::get();
        // $academicYears = AcademicYearModel::with('semesters')->get();

        // $academicYears->transform(function ($academicYear) {
        //     $academicYear->semesters = $academicYear->semesters->pluck('name')->implode(', ');
        //     return $academicYear;
        // });

        return view('livewire.pages.admin.academic-year', compact('academicYears'));
    }
}
