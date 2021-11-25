<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        "video",
        "course_id",
        "description"
     
     
    ];

    public function course(){
      
        return  $this->belongsTo(Course::class);

}

}
