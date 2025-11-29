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

                    <div class="flex flex-col justify-between mt-5 md:flex-row-reverse">
                        <form action="" method="GET" class="w-full md:w-80 lg:w-100 flex items-center gap-2">
                            <input type="text" name="search"
                                class="border px-3 py-2 rounded border-gray-300 w-full focus:outline-none" placeholder="Search">

                            <button type="submit"
                                class="bg-orange-500 hover:bg-orange-600 text-white rounded px-3 py-2 flex items-center justify-center">
                                <x-heroicon-o-magnifying-glass
                                    class="w-5 h-5 text-white cursor-pointer hover:text-gray-100" />
                            </button>
                        </form>

                        <div class="mt-5 md:mt-0">
                            <h2 class="text-lg font-semibold">Products</h2>
                            <p class="text-sm text-gray-400">Browse our collection of tech products.</p>
                        </div>
                    </div>


                </div>

            </div>

            <div class="mt-5 gap-3">

                <form action="" method="GET" class="grid grid-cols-2 gap-2 md:grid-cols-3 lg:grid-cols-6">
                    <button
                        class="px-3 py-2 bg-gray-400 hover:bg-gray-700  shadow-lg rounded-lg text-sm cursor-pointer {{ request('category') === ' ' ? 'bg-gray-700' : '' }}"
                        name="category" value="" type="submit">All Categories</button>
                    <button
                        class="px-3 py-2 bg-gray-400 hover:bg-gray-700  shadow-lg rounded-lg text-sm cursor-pointer {{ request('category') === '1' ? 'bg-gray-700' : '' }}"
                        name="category" value=1 type="submit">Computer & Laptops</button>
                    <button
                        class="px-3 py-2 bg-gray-400 hover:bg-gray-700  shadow-lg rounded-lg text-sm cursor-pointer {{ request('category') === '2' ? 'bg-gray-700' : '' }}"
                        name="category" value=2 type="submit">Audio Devices</button>
                    <button
                        class="px-3 py-2 bg-gray-400 hover:bg-gray-700  shadow-lg rounded-lg text-sm cursor-pointer {{ request('category') === '3' ? 'bg-gray-700' : '' }}"
                        name="category" value=3 type="submit">PC Peripherals</button>
                    <button
                        class="px-3 py-2 bg-gray-400 hover:bg-gray-700  shadow-lg rounded-lg text-sm cursor-pointer {{ request('category') === '4' ? 'bg-gray-700' : '' }}"
                        name="category" value=4 type="submit">PC Peripherals</button>
                    <button
                        class="px-3 py-2 bg-gray-400 hover:bg-gray-700  shadow-lg rounded-lg text-sm cursor-pointer {{ request('category') === '5' ? 'bg-gray-700' : '' }}"
                        name="category" value=5 type="submit">PC Smart Home Device</button>
                </form>
            </div>
        </section>

        <section>

            @if ($products->isEmpty())
                <p>No products</p>
            @endif

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2 mt-5">
                @foreach ($products as $product)
                    <div class="bg-gray-900 rounded-xl shadow-md border border-gray-800 flex flex-col items-center p-4">
                        
                        <div class="w-full aspect-2/2">
                            <img 
                                src="{{ asset('storage/images/' . $product->image) }}" 
                                alt="Product Image"
                                class="w-full h-full object-cover rounded-lg mb-3 flex-1"
                            >
                        </div>
                        <div class="text-white text-pretty font-medium text-base mb-1 mt-5">
                            {{ $product->name }}
                        </div>

                        <div class="flex gap-5 items-baseline mb-2 flex-1">
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
