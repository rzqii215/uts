<?php

namespace App\Livewire;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Livewire\Component;

class PortfolioPage extends Component
{
    public function render()
    {
        $profile = Profile::query()
            ->where('is_active', true)
            ->latest()
            ->first();

        $skills = Skill::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->latest()
            ->get();

        $projects = Project::query()
            ->where('is_published', true)
            ->orderByDesc('is_featured')
            ->latest()
            ->get();

        $featuredProjects = Project::query()
            ->where('is_published', true)
            ->where('is_featured', true)
            ->latest()
            ->get();

        return view('livewire.portfolio-page', [
            'profile' => $profile,
            'skills' => $skills,
            'projects' => $projects,
            'featuredProjects' => $featuredProjects,
        ]);
    }
}