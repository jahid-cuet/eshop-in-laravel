<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'slug',
        'status',
        'popular',
        'description',
        'meta_title',
        'image',
        'meta_keywords',
        'meta_descrip',
        
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'cate_id', 'id');
    }
}
