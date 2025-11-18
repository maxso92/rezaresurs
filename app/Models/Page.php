<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'name',
        'alias',
        'title',
        'seo_keyword',
        'seo_description',
        'seo_social_title',
        'seo_social_description',
        'content',
        'cover_image',
        'redirect_url',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];
}
