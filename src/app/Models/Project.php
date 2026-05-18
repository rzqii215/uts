<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'tech_stack',
        'status',
        'progress',
        'github_url',
        'demo_url',
        'is_featured',
        'is_published',
        'started_at',
        'finished_at',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'progress' => 'integer',
        'started_at' => 'date',
        'finished_at' => 'date',
    ];

    protected static function booted(): void
    {
        static::creating(function (Project $project) {
            if (blank($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });

        static::updating(function (Project $project) {
            if (blank($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'planning' => 'Perencanaan',
            'progress' => 'Sedang Dikerjakan',
            'completed' => 'Selesai',
            default => 'Tidak Diketahui',
        };
    }
}