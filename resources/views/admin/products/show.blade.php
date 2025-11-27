@extends('layouts.admin.app')

@section('title', 'Products')

@section('main-content')
    <div class="bg-linear-to-br from-[#1f2937] via-[#2d3748] to-[#c2410c] text-gray-50 min-h-screen w-full p-8">
    
        <div>
             <div class="bg-gray-900 rounded-xl shadow-md border border-gray-800 flex flex-col items-center p-4">
                        <img src="{{ asset('storage/images/' . $product->image) }}" alt="Product Image"
                            class="w-40 h-28 object-cover rounded-lg mb-3">
                        <div>
                            <div class="text-white font-medium text-center mb-1">
                            {{ $product->name }}
                            </div>

                            <div class="text-gray-400 font-medium text-sm text-pretty mb-1">
                            {{ $product->description }}
                            </div>
                        </div>
                       

                        <div class="flex gap-5 items-baseline mb-2">
                            <div class="text-orange-400 font-bold mb-1">
                                {{ $product->price }}
                            </div>
                            <div class="text-gray-400 text-xs mb-3">
                                Stock: {{ $product->stock }}
                            </div>
                        </div>
                    </div>
        </div>
    </div>
@endsection
