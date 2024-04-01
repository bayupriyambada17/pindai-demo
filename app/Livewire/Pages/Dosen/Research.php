<?php

namespace App\Livewire\Pages\Dosen;

use App\Models\ResearchModel;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Research extends Component
{
    #[Title("Riset Masyarakat")]
    public $researchId, $title, $description, $dosen_id;
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
        $this->researchId = null;
        $this->title = null;
        $this->description = null;
    }

    public function save()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $fields = [
            'title' => $this->title,
            'description' => $this->description,
            'dosen_id' => $this->dosen_id,
        ];

        if ($this->researchId) {
            $findData = ResearchModel::find($this->researchId);
            $findData->update($fields);
            $this->notification('success', 'Fakultas has been updated');
        } else {
            $exists = ResearchModel::where('description', $this->description)->first();
            if (!$exists) {
                ResearchModel::create($fields);
                $this->notification('success', 'Fakultas has been created');
            } else {
                $this->notification('error', 'Fakultas has not been created');
            }
        }

        $this->resetFields();
        $this->closeModal();
    }

    public function edit($id)
    {
        $academicYear = ResearchModel::find($id);
        $this->researchId = $id;
        $this->title = $academicYear->title;
        $this->description = $academicYear->description;
        $this->dosen_id = $academicYear->dosen_id;
        $this->openModal();
    }

    public function formDelete($id)
    {
        $formDelete = ResearchModel::find($id);
        $this->researchId = $formDelete->id;
        $this->title = $formDelete->title;
        $this->bukaModalDelete();
    }

    public function delete()
    {
        $academicYear = ResearchModel::find($this->researchId);
        $academicYear->delete();
        $this->resetFields();
        $this->notification('success', 'Fakultas has been deleted');
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
        $researchByDosen = ResearchModel::where('dosen_id', auth()->user()->id)->with([
            'dosen', 'tahunAkademik'
        ])->get();
        // dd($researchByDosen);
        return view('livewire.pages.dosen.research', compact('researchByDosen'));
    }
}
