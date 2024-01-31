<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propertie extends Model
{
    use HasFactory;

    public function media(){
        return $this->hasMany(Media::class,'property_id','id');
    }
    public function address(){
        return $this->hasOne(Address::class,'id','address_id');
    }
    public function storages(){
        return $this->hasMany(Storage::class,'propertie_id','id');
    }
}
