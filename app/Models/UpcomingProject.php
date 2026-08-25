<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpcomingProject extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function donate(){
        $this->belongsTo(Donate::class, 'donate_id','id');
    }
}
