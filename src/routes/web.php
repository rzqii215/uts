<?php

use App\Http\Controllers\ProjectController;
use App\Livewire\PortfolioPage;
use Illuminate\Support\Facades\Route;

Route::get('/', PortfolioPage::class)->name('home');

Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])
    ->name('projects.show');