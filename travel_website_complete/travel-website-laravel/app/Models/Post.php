<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    const STATUS_DRAFT = 1;        
    const STATUS_UNPUBLISHED = 2;  
    const STATUS_PUBLISHED = 4;    

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'content',
        'status',
        'image',
        'draft',
    ];

    protected $casts = [
        'draft' => 'array',
        'status' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
