<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relationship With Bookcategory
    public function bookCategory()
    {
        return $this->belongsTo(Bookcategory::class, 'category_id', 'id');
    }

    // Relationship With booksubcategory
    public function bookSubcategory()
    {
        return $this->belongsTo(booksubcategory::class, 'subcategory_id', 'id');
    }
}
