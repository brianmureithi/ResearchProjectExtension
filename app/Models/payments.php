<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    use HasFactory;
    protected $fillable = [
        "amount",
        "transaction_code",
        "user_id",
        "phone",
     
    ];
    public function course(){
      
        return  $this->belongsTo(Course::class);

}

}
