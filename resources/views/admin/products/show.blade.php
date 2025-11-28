@extends('layouts.admin.app')

@section('title', 'Products')

@section('main-content')
    <div
        class="bg-linear-to-br from-[#1f2937] via-[#2d3748] to-[#c2410c] text-gray-50 min-h-screen w-full p-8
                flex items-center justify-center">

        <div class="max-w-sm w-full">
            <div
                class="bg-gray-900/90 rounded-2xl shadow-xl border border-gray-800/70
                       flex flex-col items-center px-6 py-10 gap-4">

                <img src="{{ asset('storage/images/' . $product->image) }}" alt="Product Image"
                    class="w-40 h-40 object-cover rounded-2xl ring-1 ring-gray-700/70">

                <div class="w-full text-center space-y-2">
                    <div class="text-white font-semibold text-xl">
                        {{ $product->name }}
                    </div>

                    <div class="text-gray-400 text-sm leading-relaxed">
                        {{ $product->description }}
                    </div>
                </div>

                <div class="w-full flex flex-col items-center gap-1 mt-2">
                    <div class="text-orange-400 font-bold text-2xl">
                        {{ $product->price }}
                    </div>
                    <div class="text-gray-400 text-xs">
                        Stock: <span class="font-medium text-gray-200">{{ $product->stock }}</span>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
