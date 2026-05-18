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
        return view('livewire.portfolio-page', [
            'profile' => Profile::query()
                ->where('is_active', true)
                ->latest()
                ->first(),

            'skills' => Skill::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->get(),

            'featuredProjects' => Project::query()
                ->where('is_published', true)
                ->where('is_featured', true)
                ->latest()
                ->take(3)
                ->get(),

            'projects' => Project::query()
                ->where('is_published', true)
                ->latest()
                ->get(),
        ]);
    }
}