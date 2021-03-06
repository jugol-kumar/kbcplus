<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function shipping(){
        return $this->belongsTo(Shipping::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetails::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function address(){
        return $this->belongsTo(Address::class, 'shipping_id');
    }
}
