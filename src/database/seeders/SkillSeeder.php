<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'Laravel', 'category' => 'Backend', 'level' => 90, 'sort_order' => 1],
            ['name' => 'Filament V3', 'category' => 'Admin Panel', 'level' => 85, 'sort_order' => 2],
            ['name' => 'Livewire', 'category' => 'Frontend', 'level' => 80, 'sort_order' => 3],
            ['name' => 'Blade', 'category' => 'Frontend', 'level' => 85, 'sort_order' => 4],
            ['name' => 'MariaDB', 'category' => 'Database', 'level' => 80, 'sort_order' => 5],
            ['name' => 'Docker', 'category' => 'Technology', 'level' => 75, 'sort_order' => 6],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(
                ['name' => $skill['name']],
                [
                    'category' => $skill['category'],
                    'level' => $skill['level'],
                    'sort_order' => $skill['sort_order'],
                    'is_active' => true,
                ]
            );
        }
    }
}