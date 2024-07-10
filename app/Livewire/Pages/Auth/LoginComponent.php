<?php

namespace App\Livewire\Pages\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;

class LoginComponent extends Component
{
    #[Title("Login")]
    public $nidn, $password;
    public function login()
    {
        $this->validate([
            'nidn' => 'required|integer',
            'password' => 'required'
        ], [
            'required' => ':attribute wajib diisi',
            'integer' => ':attribute harus berupa angka',
        ]);

        $credentials = [
            'nidn' => $this->nidn,
            'password' => $this->password
        ];

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'lecturer') {
                return redirect()->route('lecturer.dashboard');
            }
        }
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.pages.auth.login-component')->layout('components.layouts.auth');
    }
}
