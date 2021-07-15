<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function attributes(){
        return $this->hasMany(Attribute::class);
    }


    public function images(){
        return $this->hasMany(ColorImage::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
