<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\inventor;

class subinventor extends Model
{
    use HasFactory;
    protected $fillable = ['inventors_id','name','email','contact','password'];

    function getinventor(){
         return $this->belongsto(inventor::class,'inventors_id','id');
    }
}
