<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function subTotal() {
        
        $user = auth()->user();

        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
        $subTotal = 0;
        
        foreach($cartItems as $item) {
            $subTotal = $subTotal + $item->product->price * $item->quantity;
        }
        return $subTotal;
    }

    public function total(){
        return $this->subTotal() + $this->subTotal() * .12;
    }

    protected $guarded = [];
}
