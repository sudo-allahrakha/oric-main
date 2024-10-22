<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResearchProjectController;
use App\Http\Controllers\ResearchPublicationController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ResearchAbstractController;
use App\Http\Controllers\EmploymentRecordController;
use App\Http\Controllers\DistinctionController;
use App\Http\Controllers\PatentController;
use App\Http\Controllers\ResearchDomainController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('tickets', TicketController::class);
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('research_projects', ResearchProjectController::class);
    Route::resource('research_publications', ResearchPublicationController::class);
    Route::resource('education', EducationController::class);
    Route::resource('trainings', TrainingController::class);
    Route::resource('research_abstracts', ResearchAbstractController::class);
    Route::resource('employment-records', EmploymentRecordController::class);
    Route::resource('distinctions', DistinctionController::class);
    Route::resource('patents', PatentController::class);
    Route::resource('research-domains', ResearchDomainController::class);
   
    Route::get('/profiles', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profiles/detail/{id}', [ProfileController::class, 'detail'])->name('profile.detail');

});



