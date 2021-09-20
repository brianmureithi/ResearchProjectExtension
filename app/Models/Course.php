<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "amount",
        "image"
    ];
    public function payment(){
        return $this->hasMany(payments::class, 'course_id','id');
    }
    public function videos(){
        return $this->hasMany(Video::class, 'course_id','id');
    }

    public function users(){
        return $this->hasMany(User::class, 'course_id','id');
    }

}
