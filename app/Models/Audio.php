<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relationship With Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // Relationship With Category
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }
}
