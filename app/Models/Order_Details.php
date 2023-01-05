<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Order_Details extends Pivot
{
    use HasFactory;

    protected $table = "order__details";

    public $incrementing = true;
    protected $guarded = ['id'];

    public function product(){
        return $this->belongsTo(Product::class)->withDefault([
            "name" => $this->product_name
        ]);
    }

    public function order()
    {
        return $this->belongsTo(Order::class)->withDefault([
            "name" => $this->product_name
        ]);
    }
}
