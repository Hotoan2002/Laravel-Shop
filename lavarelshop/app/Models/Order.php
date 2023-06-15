<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'desc', 'user_id','status'];
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
}
