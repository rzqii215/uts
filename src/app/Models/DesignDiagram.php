<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignDiagram extends Model
{
    protected $fillable = [
        'title',
        'type',
        'description',
        'image_path',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];
}