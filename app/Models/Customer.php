<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function order(){
        return $this->hasOne(Order::class);
    }
}
