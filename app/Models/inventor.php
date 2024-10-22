<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'contact', 'email', 'password', 'image', 'pincode'];

    // function subinventors(){
    //     return $this->belongstomany(subinventor::class,'role_event');
    // }

}
