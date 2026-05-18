<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::updateOrCreate(
            [
                'email' => 'rzqicndra0@gmail.com',
            ],
            [
                'name' => 'Muhamad Rizqi Candra',
                'profession' => 'UI/UX Designer',
                'phone' => '082211662026',
                'location' => 'Tangerang',
                'bio' => 'Saya Adalah UI/UX',
                'about' => 'Saya Adalah Mahasiswa Semester 4 Universitas Esa Unggul',
                'github_url' => 'https://github.com/rzqii215',
                'linkedin_url' => null,
                'instagram_url' => 'https://www.instagram.com/exyezzet?igsh=MXM3OHhvcjdhYTdiYw==',
                'is_active' => true,
            ]
        );
    }
}