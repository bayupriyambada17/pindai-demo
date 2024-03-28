<?php

use App\Livewire\Pages\Admin\AcademicYear;
use App\Livewire\Pages\Admin\DashboardComponent;
use App\Livewire\Pages\Admin\Dosen;
use App\Livewire\Pages\Admin\Fakultas;
use App\Livewire\Pages\Admin\Semesters;
use App\Livewire\Pages\Auth\LoginComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', LoginComponent::class)->name('login');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['checkIsAdmin'])->group(function () {
        Route::get('/admin/dashboard', DashboardComponent::class)->name('admin.dashboard');
        Route::get('/admin/academic-year', AcademicYear::class)->name('admin.academic-year');
        Route::get('/admin/semesters', Semesters::class)->name('admin.semesters');
        Route::get('/admin/faculty', Fakultas::class)->name('admin.faculty');
        Route::get('/admin/lecturer', Dosen::class)->name('admin.lecturer');
    });
});
