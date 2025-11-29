@extends('layouts.admin.app')

@section('title', 'Add Product')


@section('main-content')

    <div class="bg-linear-to-br from-[#1f2937] via-[#2d3748] to-[#c2410c] text-gray-50 h-screen w-full">


        <div class="flex justify-center items-center h-screen p-2">
            <form
                class="border bg-[#142536] flex flex-col gap-4  rounded  text-gray-200  w-full md:w-8/12 lg:w-5/12 xl:w-3/12 p-5"
                action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <header class="text-2xl text-center font-semibold">
                    Edit Product
                </header>

                <div>
                    <label class="text-l mb-3 font-semibold" for="name">Name:</label>
                    <input class="border border-gray-300 px-3 py-1 w-full  type="text" name="name" id="name"
                        value="{{ old('name', $product->name) }}">
                </div>

                <div>
                    <label class="text-l mb-3 font-semibold" for="description">Description: </label>
                    <textarea class="border border-gray-300 px-3 py-1 w-full" name="description" id="description">{{ old('description', $product->description) }}</textarea>
                </div>

                <div>
                    <label class="text-l mb-3 font-semibold" for="price">Price: </label>
                    <input class="border border-gray-300 px-3 py-1 w-full" type="number" name="price" id="price"
                        value="{{ old('price', $product->price) }}">
                </div>

                <div>
                    <label class="text-l mb-3 font-semibold" for="stock">Stock: </label>
                    <input class="border border-gray-300 px-3 py-1 w-full" type="number" name="stock" id="stock"
                        value="{{ old('stock', default: $product->stock) }}">
                </div>

                <div>
                    <label class="text-l mb-3 font-semibold" for="category">Category: </label>
                    <select class="border border-gray-300 px-3 py-1 w-full" name="category_id" id="category"
                        value="{{ old('category', $product->category) }}">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id === $product->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="text-l mb-3 font-semibold" for="image">Image</label>
                    <input class="border border-gray-300 px-3 py-1 w-full" type="file" name="image" id="image"
                        value="{{ old('image', $product->image) }}">
                </div>


                <div>
                    <button class="block my-3 w-full rounded py-1 px-3 bg-[#f54c00] text-white cursor-pointer"
                        type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
