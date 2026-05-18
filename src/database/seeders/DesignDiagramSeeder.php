<?php

namespace Database\Seeders;

use App\Models\DesignDiagram;
use Illuminate\Database\Seeder;

class DesignDiagramSeeder extends Seeder
{
    public function run(): void
    {
        DesignDiagram::updateOrCreate(
            [
                'type' => 'erd',
            ],
            [
                'title' => 'Entity Relationship Diagram',
                'description' => 'Diagram ERD yang menjelaskan rancangan relasi dan struktur database website portofolio.',
                'image_path' => 'images/diagrams/erd.png',
                'sort_order' => 1,
                'is_active' => true,
            ]
        );

        DesignDiagram::updateOrCreate(
            [
                'type' => 'flowchart',
            ],
            [
                'title' => 'Flowchart Sistem',
                'description' => 'Flowchart yang menjelaskan alur kerja sistem website portofolio dari pengunjung sampai data tersimpan.',
                'image_path' => 'images/diagrams/flowchart.png',
                'sort_order' => 2,
                'is_active' => true,
            ]
        );
    }
}