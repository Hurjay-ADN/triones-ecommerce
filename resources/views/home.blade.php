@extends('layouts.app')

@section('title')
    Home Page
@endsection

@section('header')
    @include('layouts.navbar')
@endsection

@section('main-content')
    <div>
        <section>
            <div>
                <h2 class="font-semibold">Products</h2>
                <p>Browse our collection of tech products.</p>
            </div>
            <div class="mt-5 flex gap-3">
                <a href="" class="px-3 py-2 bg-gray-400 shadow-lg rounded-lg text-sm">All Categories</a>
                <a href="" class="px-3 py-2 bg-gray-400 shadow-lg rounded-lg text-sm">Computer & Laptops</a>
                <a href="" class="px-3 py-2 bg-gray-400 shadow-lg rounded-lg text-sm">Audio Devices</a>
                <a href="" class="px-3 py-2 bg-gray-400 shadow-lg rounded-lg text-sm">Mobile Accessories</a>
                <a href="" class="px-3 py-2 bg-gray-400 shadow-lg rounded-lg text-sm">PC Peripherals</a>
                <a href="" class="px-3 py-2 bg-gray-400 shadow-lg rounded-lg text-sm">Smart Home Devices</a>
            </div>
        </section>

        <section>
            <div class="grid grid-cols-4 gap-6 mt-5">
                @foreach ($products as $product)
                    <div class="bg-gray-900 rounded-xl shadow-md border border-gray-800 flex flex-col items-center p-4">
                        <img src="{{ asset('storage/images/' . $product->image) }}" alt="Product Image"
                            class="w-40 h-28 object-cover rounded-lg mb-3">
                        <div class="text-white font-medium text-base mb-1">
                            {{ $product->name }}
                        </div>

                        <div class="flex gap-5 items-baseline mb-2">
                            <div class="text-orange-400 font-bold mb-1">
                                ₱{{ number_format($product->price, 2) }}
                            </div>
                            <div class="text-gray-400 text-xs mb-3">
                                Stock: {{ $product->stock }}
                            </div>
                        </div>

                        <form action="{{ route('carts.store', $product) }}" method="POST" class="w-full">
                            @csrf
                            <button type="submit"
                                class="bg-orange-500 hover:bg-orange-600 text-white rounded w-full py-2 mt-1">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </section>

    </div>
@endsection
