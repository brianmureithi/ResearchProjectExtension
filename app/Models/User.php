<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 

{
    use HasFactory;
    protected $fillable = [
        "name",
        
        'email',
        'phone',
        'country',
        'password',
    ];
    public function course(){
      
        return  $this->belongsTo(Course::class);

}
     public function subscriptions(){
      
        return  $this->hasMany(subscribed_courses::class);

} 
/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
}
