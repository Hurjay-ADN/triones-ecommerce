@extends('layouts.app')

@section('title')
    Home Page
@endsection

@section('header')
    @include('layouts.navbar')
@endsection

@section('main-content')
    <section class="">
        <div>
            <h2 class="font-semibold">Products</h2>
            <p>Browse our collection of tech products.</p>
        </div>
        <div class="mt-5 flex gap-3">
            <a href="" class="px-3 py-2 bg-white shadow-lg rounded-lg text-sm">All Categories</a>
            <a href="" class="px-3 py-2 bg-white shadow-lg rounded-lg text-sm">Computer & Laptops</a>
            <a href="" class="px-3 py-2 bg-white shadow-lg rounded-lg text-sm">Audio Devices</a>
            <a href="" class="px-3 py-2 bg-white shadow-lg rounded-lg text-sm">Mobile Accessories</a>
            <a href="" class="px-3 py-2 bg-white shadow-lg rounded-lg text-sm">PC Peripherals</a>
            <a href="" class="px-3 py-2 bg-white shadow-lg rounded-lg text-sm">Smart Home Devices</a>
        </div>
    </section>

    <section>
        <div class="grid grid-cols-5 gap-5">
            @foreach ($products as $product)
            {{-- Card --}}
            <div class="flex flex-col gap-1 border p-5">
                <div>
                    <img width="100" src="{{ asset('storage/images/' . $product->image) }}" alt="Product Image">
                </div>

                <div>
                    <h2>{{ $product->name }}</h2>
                </div>

                    <div class="flex justify-between">
                    <h2>{{ $product->price }}</h2>
                    <h2>{{ $product->stock }}</h2>
                </div>

                <div>
                    <form action="" method="POST">
                        @csrf
                        <button type="submit" name="add">Add to cart</button>
                    </form>
                </div>
            </div>
                
            @endforeach
        </div>
    </section>
@endsection
