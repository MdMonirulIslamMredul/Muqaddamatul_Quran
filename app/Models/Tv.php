<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tv extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relationship With Tvcategory
    public function tvCategory()
    {
        return $this->belongsTo(Tvcategory::class, 'category_id', 'id');
    }

    // Relationship With Tvsubcategory
    public function tvSubcategory()
    {
        return $this->belongsTo(Tvsubcategory::class, 'subcategory_id', 'id');
    }
}
