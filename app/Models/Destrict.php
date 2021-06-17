<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destrict extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function division(){
        $this->belongsTo(Division::class);
    }

    public function thanas(){
        return $this->hasMany(Thana::class);
    }

}
