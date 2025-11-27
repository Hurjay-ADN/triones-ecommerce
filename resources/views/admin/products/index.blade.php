@extends('layouts.admin.app')

@section('title', 'Products')

@section('main-content')
    <div class="bg-linear-to-br from-[#1f2937] via-[#2d3748] to-[#c2410c] text-gray-50 min-h-screen w-full p-8">
        <div class="mb-4 flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-lg">Products</h2>
                <p class="text-gray-300 text-sm">Manage your product catalog</p>
            </div>
            <a href="{{ route('admin.products.create') }}"
                class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded font-semibold shadow">
                + Add Product
            </a>
        </div>

        <div class="bg-[#23314c] rounded-xl p-4 shadow-lg">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-gray-300 border-b border-gray-700">
                        <th class="py-3 px-4 text-left">ID</th>
                        <th class="py-3 px-4 text-left">Product Name</th>
                        <th class="py-3 px-4 text-left">Price</th>
                        <th class="py-3 px-4 text-left">Stock</th>
                        <th class="py-3 px-4 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="border-b border-gray-800 hover:bg-[#223044] transition">
                            <td class="py-3 px-4">{{ $product->id }}</td>
                            <td class="py-3 px-4 flex items-center gap-2">
                                <img src="{{ asset('storage/images/' . $product->image) }}" alt="image"
                                    class="w-10 h-10 object-cover rounded shadow-sm border border-gray-700">
                                <span>{{ $product->name }}</span>
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
                            <td class="py-3 px-4 flex gap-2 items-center">
                                <a href="{{ route('admin.products.show', $product) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">View</a>
                                <a href="{{ route('admin.products.edit', $product) }}"
                                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-3 py-1 rounded">Edit</a>
                                <form action="{{ route('admin.products.destory', $product) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded"
                                        type="submit">Delete</button>
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
