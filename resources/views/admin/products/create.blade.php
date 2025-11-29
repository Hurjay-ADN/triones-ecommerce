@extends('layouts.admin.app')

@section('title', 'Add Product')


@section('main-content')
    <div class="bg-linear-to-br from-[#1f2937] via-[#2d3748] to-[#c2410c] text-gray-50 h-screen w-full px-5 xl:px-0">

        <div class="flex justify-center items-center h-screen"">
            <form
                class="border bg-[#142536] flex flex-col gap-4 rounded  text-gray-200 w-full md:w-8/12 lg:w-5/12 xl:w-3/12 p-5"
                action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <header class="text-2xl text-center font-semibold">
                    Add Product
                </header>
                <div>
                    <label class="text-l mb-3 font-semibold" for="name">Name: </label>
                    <input class="border border-gray-300 px-3 py-1 w-full "type="text" name="name" id="name">
                    @error('name')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div>
                    <label class="text-l mb-3 font-semibold" for="description">Description: </label>
                    <textarea class="border border-gray-300 px-3 py-1 w-full" name="description" id="description"></textarea>
                    @error('description')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror

                </div>

                <div>
                    <label class="text-l mb-3 font-semibold" for="price">Price: </label>
                    <input class="border border-gray-300 px-3 py-1 w-full" type="number" name="price" id="price">
                    @error('price')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div>
                    <label class="text-l mb-3 font-semibold" for="stock">Stock: </label>
                    <input class="border border-gray-300 px-3 py-1 w-full" type="number" name="stock" id="stock">
                    @error('stock')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div>
                    <label class="text-l mb-3 font-semibold" for="category_id">Category: </label>
                    <select class="cursor-pointer border border-gray-300 bg-[#142536] text-gray-200 px-3 py-1 w-full"
                        name="category_id" id="category">
                        @foreach ($categories as $category)
                            <option class="cursor-pointer" value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div>
                    <label class="text-l mb-3 font-semibold" for="image">Image</label>
                    <input class="cursor-pointer border border-gray-300 px-3 py-1 w-full" type="file" name="image"
                        id="image">
                    @error('image')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div><button
                        class="block my-3 w-full rounded py-1 px-3 bg-[#f54c00] hover:bg-[#c75723] text-white cursor-pointer"
                        type="submit">Add Product</button></div>
            </form>
        </div>

    </div>
@endsection
