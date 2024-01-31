<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function size(){
        return $this->hasOne(Sizes::class,'id','size_id');
    }
}
