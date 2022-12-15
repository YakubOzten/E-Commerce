<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class OrderItem extends Model
{
    protected $table='order_items';

    protected $fillable=[
        'order_id','prod_id','qty','price'

    ];
//    public function carts(): BelongsTo
//    {
//
//        return $this->belongsTo(Cart::class,'prod_id','id');
//
//    }
    public  function products() : BelongsTo
    {
        return $this->belongsTo(Product::class,'prod_id','id');
    }

    use HasFactory;
}
