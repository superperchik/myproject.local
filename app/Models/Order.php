<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_name', 'order_date', 'status', 'comment', 'product_id', 'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Для вычисления итоговой цены заказа
    public function getTotalPriceAttribute(): float|int
    {
        return $this->quantity * $this->product->price;
    }
}

