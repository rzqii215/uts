<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectsPage extends Component
{
    public function render()
    {
        $projects = Project::query()
            ->where('is_published', true)
            ->orderByDesc('is_featured')
            ->latest()
            ->get();

        return view('livewire.projects-page', [
            'projects' => $projects,
        ]);
    }
}