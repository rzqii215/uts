<?php

use App\Livewire\PortfolioPage;
use App\Livewire\ProjectsPage;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', PortfolioPage::class)->name('home');

Route::get('/projects', ProjectsPage::class)->name('projects.index');

Route::get('/projects/{project}', function (Project $project) {
    abort_unless($project->is_published, 404);

    return view('projects.show', [
        'project' => $project,
    ]);
})->name('projects.show');