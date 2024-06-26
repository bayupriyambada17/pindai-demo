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
use App\Livewire\Pages\Front\DetailFaculty;
use App\Livewire\Pages\Front\Homepage;
use Illuminate\Support\Facades\Route;

Route::get('/', Homepage::class)->name('home');
Route::get('/{id}/faculty', DetailFaculty::class)->name('detail.faculty');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', LoginComponent::class)->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['checkIsAdmin'])->name('admin.')->prefix('admin')->group(function () {
        Route::get('/dashboard', DashboardComponent::class)->name('dashboard');
        Route::get('/academic-year', AcademicYear::class)->name('academic-year');
        Route::get('/faculties', Faculty::class)->name('faculty');
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
    });
});
