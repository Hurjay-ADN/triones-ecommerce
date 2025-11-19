@extends('layouts.admin.app')

@section('title', 'Add Product')


@section('main-content')
    <div class="bg-gradient-to-br from-[#1f2937] via-[#2d3748] to-[#c2410c] text-gray-50 h-screen w-full">

        <div class="flex justify-center items-center h-screen"">
            <form class="border bg-[#142536] flex flex-col gap-4  rounded  text-gray-200 w-full lg:w-3/12 p-5"
                action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="text-l mb-3 font-semibold" for="name">Name: </label>
                    <input class="border border-gray-300 px-3 py-1 w-full "type="text" name="name" id="name">
                </div>

                <div>
                    <label class="text-l mb-3 font-semibold" for="description">Description: </label>
                    <textarea class="border border-gray-300 px-3 py-1 w-full" name="description" id="description"></textarea>
                </div>

                <div>
                    <label class="text-l mb-3 font-semibold" for="price">Price: </label>
                    <input class="border border-gray-300 px-3 py-1 w-full" type="number" name="price" id="price">
                </div>

                <div>
                    <label class="text-l mb-3 font-semibold" for="stock">Stock: </label>
                    <input class="border border-gray-300 px-3 py-1 w-full" type="number" name="stock" id="stock">
                </div>

                <div>
                    <label class="text-l mb-3 font-semibold" for="category">Category: </label>
                    <select class="border border-gray-300 px-3 py-1 w-full" name="category_id" id="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="text-l mb-3 font-semibold" for="image">Image</label>
                    <input class="border border-gray-300 px-3 py-1 w-full" type="file" name="image" id="image">
                </div>

                <div><button class="block my-3 w-full rounded py-1 px-3 bg-[#f54c00] text-white cursor-pointer"
                        type="submit">Add Product</button></div>
            </form>
        </div>

    </div>
@endsection
