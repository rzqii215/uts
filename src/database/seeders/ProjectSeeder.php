<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Website Portofolio Personal',
                'short_description' => 'Website portofolio dinamis menggunakan Laravel, Livewire, Blade, Filament, dan MariaDB.',
                'description' => 'Project ini dibuat untuk memenuhi UTS Pemrograman Web. Website memiliki halaman profil, showcase project, form kontak, dan admin panel untuk mengelola konten secara dinamis.',
                'tech_stack' => 'Laravel, Livewire, Blade, Filament V3, MariaDB, Docker',
                'status' => 'progress',
                'progress' => 80,
                'github_url' => null,
                'demo_url' => null,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'Sistem Manajemen Project Akhir',
                'short_description' => 'Aplikasi untuk mengelola progress project akhir secara dinamis melalui admin panel.',
                'description' => 'Sistem ini digunakan untuk mencatat data project, status pengerjaan, progress, dan dokumentasi sederhana agar dapat diperbarui melalui dashboard admin.',
                'tech_stack' => 'Laravel, Filament V3, MariaDB',
                'status' => 'planning',
                'progress' => 40,
                'github_url' => null,
                'demo_url' => null,
                'is_featured' => false,
                'is_published' => true,
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['slug' => Str::slug($project['title'])],
                array_merge($project, [
                    'slug' => Str::slug($project['title']),
                ])
            );
        }
    }
}