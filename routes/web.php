<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FolioController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\DashboardController;

// Redirect root to folio index
Route::get('/', function () {
    return view('folio.index');
});

// Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/section/{section}', [DashboardController::class, 'section'])->name('dashboard.section');
Route::get('/dashboard/{type}/{id}', [DashboardController::class, 'showDetail'])->name('dashboard.show');
Route::get('/dashboard/{type}/{id}/edit-form', [DashboardController::class, 'editFormDetail'])->name('dashboard.edit-form');

// FolioOne Portfolio Routes
Route::get('/', [FolioController::class, 'index'])->name('index');
Route::get('/about', [FolioController::class, 'about'])->name('about');
Route::get('/resume', [FolioController::class, 'resume'])->name('resume');
Route::get('/services', [FolioController::class, 'services'])->name('services');
Route::get('/portfolio', [FolioController::class, 'portfolio'])->name('portfolio');
Route::get('/contact', [FolioController::class, 'contact'])->name('contact');
Route::get('/service-details', [FolioController::class, 'serviceDetails'])->name('service-details');
Route::get('/portfolio-details', [FolioController::class, 'portfolioDetails'])->name('portfolio-details');
Route::get('/starter-page', [FolioController::class, 'starterPage'])->name('starter-page');
Route::post('/contact', [FolioController::class, 'storeContact'])->name('contact.store');

// Resource Routes for Avis, Services, Skills, Resumes
Route::resource('avis', AvisController::class);
Route::resource('services', ServiceController::class);
Route::resource('skills', SkillController::class);
Route::resource('resumes', ResumeController::class);


