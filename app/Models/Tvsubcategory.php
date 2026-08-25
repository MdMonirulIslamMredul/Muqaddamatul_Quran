<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tvsubcategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relationship With Tvcategory
    public function tvCategory()
    {
        return $this->belongsTo(Tvcategory::class, 'category_id', 'id');
    }

    // Relationship With Tv
    public function tvs()
    {
        return $this->hasMany(Tv::class, 'subcategory_id', 'id');
    }
}
