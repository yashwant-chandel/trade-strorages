<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function sizes(){
        return $this->hasMany(Sizes::class,'category_id','id');
    }
    public function features(){
        return $this->hasMany(Feature::class,'category_id','id');
    }
}
