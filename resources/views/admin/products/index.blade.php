@extends('layouts.admin.app')

@section('title', 'Products')

@section('main-content')
    <div class="p-3">
        <h2 class="font-semibold text-lg">Products</h2>
    </div>

    <div class="p-3 w-full">
        <div class="flex justify-between">
            <input type="text" class="border border-gray-200 px-3 py-1" placeholder="Search">
            <a href="{{ route('admin.products.create') }}" class="block">
                Add Product
            </a>
        </div>
        <table class="w-full mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>

                            <img width="50" src="{{ asset('storage/images/' . $product->image) }}" alt="image">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <div>
                                <button>View</button>
                                <a href="{{ route('admin.products.edit', $product) }}">Edit</a>
                               <form action="{{ route('admin.products.destory', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button>Delete</button>
                                </form>
                                
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection