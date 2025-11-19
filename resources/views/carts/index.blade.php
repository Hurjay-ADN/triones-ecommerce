@extends('layouts.app')


@section('main-content')
    <div class="flex gap-3 mt-5">
        {{-- Cart History --}}
        <table class="w-full mt-5 border">
            <thead>
                <tr class="border">
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>
                    
                @foreach ($carts as $cart)
                    <tr>
                        <td>{{ $cart->id }}</td>
                            <td>{{ $cart->product->name }}</td>
                        <td>
                            <button type="minus">-</button>
                            <span>{{ $cart->quantity }}</span>
                            <button type="plus">+</button>
                        </td>

                            @php
                                $subTotal = $cart->product->price * $cart->quantity;
                            @endphp

                            <td><span>&#8369; {{ $cart->product->price }}</span></td>
                            <td><span>&#8369; {{  $subTotal }}</span></td>

                        <td>
                            <form action="" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="btn-delete"> 
                                    <span>Delete</span>
                                </button>
                               
                            </form>       
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Order Summary --}}

        
        <div class="border">
            <form action="{{ route('carts.checkout') }}" method="post">
                @csrf
                {{-- Adrress --}}
                <div>
                    <label for="shipping_address">Shipping Address</label>
                    <textarea class="border" name="shipping_address" id="shipping_address"></textarea>
                </div>

                {{-- Summary --}}
                <div class="border">
                    <h2>Order Summary</h2>
                    <div>
                        <label for="subtotal">Subtotal</label>

                        
                          @isset($cart)
                            <h2>{{ $cart->subTotal()}}</h2>
                          @endisset
                       

                    </div>
                    <div>
                        <label for="tax">Tax (12%)</label>
                        @isset($cart)
                            <h2>{{ $cart->subTotal() * .12 }}</h2>
                        @endisset
                        
                    </div>

                      <div>
                        <label for="tax">Total</label>
                        @isset($cart)
                            <h2>{{ $cart->total()}}</h2>
                        @endisset
                       
                    </div>


                    <div>
                        <button type="checkout" name="checkout">Checkout</button>
                    </div>
                </div>
             
            </form>
        </div>

    </div>
@endsection