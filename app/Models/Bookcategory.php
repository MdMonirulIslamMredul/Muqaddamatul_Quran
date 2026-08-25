<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookcategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relationship With Booksubcategory
    public function bookSubcategories()
    {
        return $this->hasMany(Booksubcategory::class, 'category_id', 'id');
    }

    // Relationship With Book
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
