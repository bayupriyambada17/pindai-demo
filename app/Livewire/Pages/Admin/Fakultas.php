<?php

namespace App\Livewire\Pages\Admin;

use App\Models\FakultasModel;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Fakultas extends Component
{
    #[Title("Academic Year")]
    public $fakultasId, $nama_fakultas, $kode_fakultas, $target;
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
        $this->fakultasId = null;
        $this->nama_fakultas = null;
        $this->kode_fakultas = null;
    }

    public function save()
    {
        $this->validate([
            'nama_fakultas' => 'required',
            'kode_fakultas' => 'required',
        ]);

        $fields = [
            'nama_fakultas' => $this->nama_fakultas,
            'kode_fakultas' => $this->kode_fakultas,
            'target' => $this->target,
        ];

        if ($this->fakultasId) {
            $findData = FakultasModel::find($this->fakultasId);
            $findData->update($fields);
            $this->notification('success', 'Fakultas has been updated');
        } else {
            $exists = FakultasModel::where('kode_fakultas', $this->kode_fakultas)->first();
            if (!$exists) {
                FakultasModel::create($fields);
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
        $academicYear = FakultasModel::find($id);
        $this->fakultasId = $id;
        $this->nama_fakultas = $academicYear->nama_fakultas;
        $this->kode_fakultas = $academicYear->kode_fakultas;
        $this->target = $academicYear->target;
        $this->openModal();
    }

    public function formDelete($id)
    {
        $formDelete = FakultasModel::find($id);
        $this->fakultasId = $formDelete->id;
        $this->nama_fakultas = $formDelete->nama_fakultas;
        $this->bukaModalDelete();
    }

    public function delete()
    {
        $academicYear = FakultasModel::find($this->fakultasId);
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
        $fakultas = FakultasModel::paginate(10);
        return view('livewire.pages.admin.fakultas', compact('fakultas'));
    }
}
