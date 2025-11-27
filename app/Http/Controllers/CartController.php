<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Product $product)
    {
        $cartItem = Cart::where('user_id', auth()->id())->where('product_id', $product->id)->first();

        if ($product->stock < 1) {
            return;
        }

        if (empty($cartItem)) {
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'quantity' => 1
            ]);
        } else {

            $cartItem->quantity = $cartItem->quantity + 1;
            $cartItem->save();
        }

        $product->stock = $product->stock - 1;
        $product->save();

        return redirect()->route('home')->with('success', 'Cart successfully added.');
    }

    public function index()
    {
        $carts = Cart::with('product')->where('user_id', auth()->id())->paginate(10);
        // dd($carts);

        return view('carts.index', compact('carts'));
    }


    public function updateQuantity(Request $request, Cart $cart){
    
        if ($request->input('updateQuantity'))
             $cart->quantity++;
        else
            if( $cart->quantity > 1)
                $cart->quantity--;
           
    
        $cart->save();

        return redirect()->route('carts.index');
    }




    public function checkOut(Request $request, Cart $cart)
    {
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
        $total = $cart->total();

        if($cartItems->isEmpty()){
            return to_route('carts.index');
        }

        $request->validate([
            'shipping_address' => ['required', 'string', 'max:255']
        ]);

        $order = Order::create(
            [
                'user_id' => auth()->id(),
                'total' => $total,
                'shipping_address' => $request->input('shipping_address')
            ]
        );

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product->id,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
                'product_name' => $item->product->name,
            ]);
        }
        $userCart = Cart::where('user_id', auth()->id())->delete();

        return redirect()->route('carts.index')->with('success', 'Order successfully created.');
    }

    public function destroy(Cart $cart){
        $cart->delete();

        return to_route('carts.index');
    }
}
