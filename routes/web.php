<?php

use App\Livewire\Pages\Admin\AcademicYear;
use App\Livewire\Pages\Admin\DashboardComponent;
use App\Livewire\Pages\Admin\Dosen;
use App\Livewire\Pages\Admin\Faculty;
use App\Livewire\Pages\Admin\Research;
use App\Livewire\Pages\Admin\Semesters;
use App\Livewire\Pages\Auth\LoginComponent;
use App\Livewire\Pages\Dosen\Dashboard;
use App\Livewire\Pages\Dosen\Research as DosenResearch;
use App\Livewire\Pages\Dosen\Research\View as ResearchView;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', LoginComponent::class)->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['checkIsAdmin'])->group(function () {
        Route::get('/admin/dashboard', DashboardComponent::class)->name('admin.dashboard');
        Route::get('/admin/academic-year', AcademicYear::class)->name('admin.academic-year');
        Route::get('/admin/semesters', Semesters::class)->name('admin.semesters');
        Route::get('/admin/faculty', Faculty::class)->name('admin.faculty');
        Route::get('/admin/lecturer', Dosen::class)->name('admin.lecturer');
        Route::get('/admin/research', Research::class)->name('admin.research');
    });
});
Route::middleware(['auth'])->group(function () {
    Route::middleware(['checkIsDosen'])->name('dosen.')->prefix('dosen')->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
        Route::get('/research', DosenResearch::class)->name('research');
        Route::get('/research/{id}/view', ResearchView::class)->name('research.view');
        // Route::get('/admin/academic-year', AcademicYear::class)->name('admin.academic-year');
        // Route::get('/admin/semesters', Semesters::class)->name('admin.semesters');
        // Route::get('/admin/faculty', Fakultas::class)->name('admin.faculty');
        // Route::get('/admin/lecturer', Dosen::class)->name('admin.lecturer');
        // Route::get('/admin/research', Research::class)->name('admin.research');
    });
});
