<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_id',
        'title',
        'description',
        'slug',
        'url',
        'order',
        'image',
        'status',
        'position',
        'metaTitle',
        'metaDescription',
        'metaTag'
    ];
}
