<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';

    protected $fillable=[

        'user_id','firstname','lastname','email','phone','adress1','adress2','city','','phone',
        'adress1','adress2','city','state','country','postcode','total_price','payment_mode','payment_id','message','tracking_no'
    ];
    public function orderitems(){

        return $this->hasMany(OrderItem::class);
    }
    use HasFactory;
}
