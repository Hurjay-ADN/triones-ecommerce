@extends('layouts.app')

@section('main-content')
    <div class="flex flex-col lg:flex-row gap-4 mt-10 justify-center items-start">

        {{-- Cart Table --}}
        <div class="bg-[#232a39] text-gray-50 rounded-xl shadow-lg p-6 w-full lg:w-9/12 overflow-x-auto lg:overflow-hidden">
            <h2 class="font-semibold text-lg mb-2">My Cart</h2>
            <p class="text-gray-300 text-xs mb-5">Review your items before checkout</p>

            {{-- TABLE --}}
            <table class="text-sm min-w-max  md:w-full ">
                <thead>
                    <tr class="text-gray-300 border-b border-gray-700">
                        <th class="py-2">ID</th>
                        <th class="py-2">Product Name</th>
                        <th class="py-2">Quantity</th>
                        <th class="py-2">Price</th>
                        <th class="py-2">Subtotal</th>
                        <th class="py-2">Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($carts as $cart)
                        <tr class="border-b border-gray-800 hover:bg-[#223044] transition">
                            <td class="py-2 px-2">{{ $cart->id }}</td>
                            <td class="py-2 px-2">{{ $cart->product->name }}</td>
                            <td class="py-2 px-2 flex justify-center items-center gap-2">
                                <form action="{{ route('carts.update', $cart) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button name="updateQuantity" value=0
                                        class="bg-gray-700 hover:bg-gray-300 text-white hover:text-black rounded px-2 py-1 cursor-pointer">-</button>
                                    <span class="bg-gray-800 rounded px-3 py-1">{{ $cart->quantity }}</span>
                                    <button name="updateQuantity" value=1
                                        class="bg-gray-700 hover:bg-gray-300 text-white hover:text-black rounded px-2 py-1 cursor-pointer">+</button>
                                </form>

                            </td>
                            @php
                                $subTotal = $cart->product->price * $cart->quantity;
                            @endphp
                            <td class="py-2 text-right px-2">&#8369; {{ number_format($cart->product->price, 2) }}</td>
                            <td class="py-2 text-right px-2 text-orange-400 font-bold">&#8369; {{ number_format($subTotal, 2) }}
                            </td>
                            <td class="py-2 px-2 text-center">
                                <form action="{{ route('carts.destroy', $cart) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="btn-delete"
                                        class="text-red-500 px-3 py-1 rounded hover:text-red-700">
                                        <span>
                                            <x-heroicon-o-trash
                                                class="w-6 h-6 text-red-500  hover:text-red-700 cursor-pointer" />
                                        </span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Order Summary --}}
        <div class="bg-[#232a39] text-gray-50 rounded-xl shadow-lg p-8 w-full lg:w-4/12 flex flex-col">
            <form action="{{ route('carts.checkout') }}" method="post">
                @csrf
                {{-- Address --}}
                <div class="mb-5">
                    <label for="shipping_address" class="block mb-2 font-semibold">Shipping Address</label>
                    <textarea class="border border-gray-800 rounded w-full p-2 bg-[#223044] text-gray-50" name="shipping_address"
                        id="shipping_address" placeholder="Enter your address here"></textarea>
                    @error('shipping_address')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                {{-- Order Payment --}}
                <div class="bg-[#223044] p-4 rounded-lg mb-4">
                    <div class="flex flex-col gap-3 ">
                        <label class="text-base font-semibold" for="Payment Option">Payment Option</label>
                        <select class="text-sm -m-1" name="paymentOption">
                            <option class="bg-[#223044]" value="cod">Cash on Delivery</option>
                            <option disabled class="bg-[#223044]" value="cash">Gcash</option>
                            <option disabled class="bg-[#223044]" value="cash">Paypal</option>
                        </select>
                    </div>


                </div>

                {{-- Summary --}}
                <div class="bg-[#223044] p-4 rounded-lg mb-4">
                    <h2 class="text-base font-semibold mb-4">Order Summary</h2>
                    <div class="flex justify-between text-sm mb-2">
                        <span>Subtotal</span>
                        @isset($cart)
                            <span class="font-bold">&#8369;{{ number_format($cart->subTotal(), 2) }}</span>
                        @endisset
                    </div>
                    <div class="flex justify-between text-sm mb-2">
                        <span>Tax (12%)</span>
                        @isset($cart)
                            <span class="font-bold">&#8369;{{ number_format($cart->subTotal() * 0.12, 2) }}</span>
                        @endisset
                    </div>
                    <div class="flex justify-between font-bold text-orange-400 text-lg mb-6">
                        <span>Total</span>
                        @isset($cart)
                            <span>&#8369;{{ number_format($cart->total(), 2) }}</span>
                        @endisset
                    </div>
                </div>
                <button type="checkout" name="checkout"
                    class="bg-orange-500 hover:bg-orange-600 w-full text-white rounded py-2 font-semibold flex items-center justify-center gap-2">
                    Checkout
                </button>
                <p class="text-gray-400 text-xs text-center mt-5">Secure checkout powered by Triones.</p>
            </form>
        </div>
    </div>
@endsection
