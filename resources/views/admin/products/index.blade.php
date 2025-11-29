@extends('layouts.admin.app')

@section('title', 'Products')

@section('main-content')
    <div class="bg-linear-to-br from-[#1f2937] via-[#2d3748] to-[#c2410c] text-gray-50 min-h-screen w-full p-8">
        <div class="mb-4 flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-white text-lg">Products</h2>
                <p class="text-gray-400 text-sm">Manage your product catalog</p>
            </div>
            <a href="{{ route('admin.products.create') }}"
                class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded font-semibold shadow">
                + Add Product
            </a>
        </div>

        <div class="bg-[#23314c] rounded-xl p-4 shadow-lg">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-gray-300 border-b text-center border-gray-700">
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Product Name</th>
                        <th class="py-3 px-4">Price</th>
                        <th class="py-3 px-4">Stock</th>
                        <th class="py-3 px-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="text-center border-b border-gray-800 hover:bg-[#223044] transition">
                            <td class="py-3 px-4">{{ $product->id }}</td>

                            <td class="py-3 px-4">
                                <span class="text-gray-100">{{ $product->name }}</span>
                            </td>


                            <td class="py-3 px-4 text-orange-400 font-bold">
                                ₱{{ number_format($product->price, 2) }}
                            </td>
                            <td class="py-3 px-4">
                                @php
                                    $stockClass = $product->stock < 20 ? 'bg-red-500' : 'bg-gray-700';
                                @endphp
                                <span class="px-3 py-1 rounded-full text-white font-bold {{ $stockClass }}">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td class="py-3 px-4 flex gap-2 justify-center items-center">

                                <a href="{{ route('admin.products.show', $product) }}"
                                    class="text-blue-500 hover:text-blue-700 text-center px-3 py-1">
                                    <x-heroicon-o-rectangle-stack class="w-6 h-6" />

                                </a>

                                <a href="{{ route('admin.products.edit', $product) }}"
                                    class="text-green-500 hover:text-green-700  px-3 py-1  text-center">
                                    <x-heroicon-o-pencil-square class="w-6 h-6" />

                                </a>

                                <form action="{{ route('admin.products.destory', $product) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="btn-delete"
                                        class="text-red-500 px-3 py-1 rounded hover:text-red-700">
                                        <span>
                                            <x-heroicon-o-trash class="w-6 h-6  cursor-pointer" />
                                        </span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

            <div class="mt-5">
                {{ $products->links() }}
            </div>

        </div>
    </div>
@endsection
