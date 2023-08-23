<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    function order_details(){
        return $this->hasMany(OrderDetail::class);  //HasMany มีหลายตัว หรือ ทำให้เป็น array เพื่อให้สามารถใข้ foreach ได้
    }
}
