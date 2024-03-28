<?php

namespace App\Livewire\Pages\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Dosen extends Component
{
    #[Title("Dosen")]
    public $dosenId, $nidn, $name, $email;
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
        $this->dosenId = null;
        $this->nidn = null;
        $this->name = null;
        $this->email = null;
    }

    public function save()
    {
        $this->validate([
            'nidn' => 'required',
            'name' => 'required',
            'email' => 'required',
        ]);

        $fields = [
            'nidn' => $this->nidn,
            'name' => $this->name,
            'email' => $this->email,
            // 'password' => Hash::make($this->nidn),
        ];

        if ($this->dosenId) {
            $findData = User::find($this->dosenId);
            $findData->update($fields);
            $this->notification('success', 'Dosen has been updated');
        } else {
            $exists = User::where('email', $this->email)->first();
            if (!$exists) {
                $fields['password'] = Hash::make($this->nidn);
                User::create($fields);
                $this->notification('success', 'Dosen has been created');
            } else {
                $this->notification('error', 'Dosen has not been created');
            }
        }

        $this->resetFields();
        $this->closeModal();
    }

    public function edit($id)
    {
        $academicYear = User::find($id);
        $this->dosenId = $id;
        $this->nidn = $academicYear->nidn;
        $this->name = $academicYear->name;
        $this->email = $academicYear->email;
        $this->openModal();
    }

    public function formDelete($id)
    {
        $formDelete = User::find($id);
        $this->dosenId = $formDelete->id;
        $this->nidn = $formDelete->nidn;
        $this->bukaModalDelete();
    }

    public function delete()
    {
        $academicYear = User::find($this->dosenId);
        $academicYear->delete();
        $this->resetFields();
        $this->notification('success', 'Dosen has been deleted');
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
        $dosen = User::where('role', 'dosen')->get();
        return view('livewire.pages.admin.dosen', compact('dosen'));
    }
}
