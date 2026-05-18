<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function show(Project $project): View
    {
        abort_if(! $project->is_published, 404);

        return view('projects.show', [
            'project' => $project,
        ]);
    }
}