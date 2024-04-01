<?php

use App\Livewire\Pages\Admin\AcademicYear;
use App\Livewire\Pages\Admin\DashboardComponent;
use App\Livewire\Pages\Admin\Faculty;
use App\Livewire\Pages\Admin\Faculty\Lecturer as FacultyLecturer;
use App\Livewire\Pages\Admin\Lecturer;
use App\Livewire\Pages\Admin\Research;
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
    Route::middleware(['checkIsAdmin'])->name('admin.')->prefix('admin')->group(function () {
        Route::get('/dashboard', DashboardComponent::class)->name('dashboard');
        Route::get('/academic-year', AcademicYear::class)->name('academic-year');
        Route::get('/faculty', Faculty::class)->name('faculty');
        Route::get('/faculty/{id}/lecturer', FacultyLecturer::class)->name('faculty.lecturer');
        Route::get('/lecturer', Lecturer::class)->name('lecturer');
        Route::get('/research', Research::class)->name('research');
    });
});
Route::middleware(['auth'])->group(function () {
    Route::middleware(['checkIsDosen'])->name('lecturer.')->prefix('lecturer')->group(function () {
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
