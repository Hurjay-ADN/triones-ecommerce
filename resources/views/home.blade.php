@extends('layouts.layout')

@section('title')
    Home Page
@endsection

@section('header')
    @include('layouts.navbar')
@endsection

@section('main-content')
    <section class="w-11/12 p-5 m-auto">
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
@endsection
