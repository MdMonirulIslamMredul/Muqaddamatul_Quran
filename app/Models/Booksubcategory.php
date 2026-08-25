<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booksubcategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relationship With Category
    public function bookCategory()
    {
        return $this->belongsTo(Bookcategory::class, 'category_id', 'id');
    }

    // Relationship With Book
    public function books()
    {
        return $this->hasMany(Book::class, 'subcategory_id', 'id');
    }
}
