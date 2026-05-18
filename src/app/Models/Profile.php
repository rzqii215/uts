<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'profession',
        'email',
        'phone',
        'location',
        'bio',
        'about',
        'github_url',
        'linkedin_url',
        'instagram_url',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}