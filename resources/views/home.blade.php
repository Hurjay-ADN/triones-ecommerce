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
                <div>
                    <div class="flex justify-between mt-5">
                        <h2 class="font-semibold">Products</h2>
                        <form action="" method="GET">
                            <input type="text" name="search" class="border px-3 py-1 rounded border-gray-300 w-90" placeholder="Search">
                            <button type="submit"
                                class="bg-orange-500 hover:bg-orange-600 text-white rounded px-3 py-1">
                                Search
                            </button>
                        </form>
                    </div>
                </div>
                <p>Browse our collection of tech products.</p>
            </div>
            
            <div class="mt-5 flex gap-3">
                
                <form action="" method="GET"> 
                    <button  class="px-3 py-2 bg-gray-400 shadow-lg rounded-lg text-sm cursor-pointer {{ request('category') === " " ? "bg-gray-600" : ""}}" name="category" value="" type="submit">All Categories</button>
                    <button  class="px-3 py-2 bg-gray-400 shadow-lg rounded-lg text-sm cursor-pointer {{ request('category') === "1" ? "bg-gray-600" : ""}}" name="category" value=1 type="submit">Computer & Laptops</button>
                    <button  class="px-3 py-2 bg-gray-400 shadow-lg rounded-lg text-sm cursor-pointer {{ request('category') === "2" ? "bg-gray-600" : ""}}" name="category" value=2 type="submit">Audio Devices</button>
                    <button  class="px-3 py-2 bg-gray-400 shadow-lg rounded-lg text-sm cursor-pointer {{ request('category') === "3" ? "bg-gray-600" : ""}}" name="category" value=3 type="submit">PC Peripherals</button>
                    <button  class="px-3 py-2 bg-gray-400 shadow-lg rounded-lg text-sm cursor-pointer {{ request('category') === "4" ? "bg-gray-600" : ""}}" name="category" value=4 type="submit">PC Peripherals</button>
                    <button  class="px-3 py-2 bg-gray-400 shadow-lg rounded-lg text-sm cursor-pointer {{ request('category') === "5" ? "bg-gray-600" : ""}}" name="category" value=5 type="submit">PC Smart Home Device</button>
                </form>
            </div>
        </section>

        <section>

            @if ($products->isEmpty())
                <p>No products</p>
            @endif
        
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
