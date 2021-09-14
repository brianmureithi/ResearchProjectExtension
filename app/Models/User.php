<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        'name',
        'email',
        'phone',
        'country',
        'password',
    ];
    public function course(){
      
        return  $this->belongsTo(Course::class);

}
    
}
