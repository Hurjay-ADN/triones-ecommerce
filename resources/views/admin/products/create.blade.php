@extends('layouts.admin.app')

@section('title', 'Add Product')
  

@section('main-content')
    <h1>hello</h1>
    <div>
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Name: </label>
                <input type="text" name="name" id="name">
            </div>

            <div>
                <label for="description">Description: </label>
                <textarea name="description" id="description"></textarea>
            </div>

            <div>
                <label for="price">Price: </label>
                <input type="number" name="price" id="price">
            </div>

            <div>
                <label for="stock">Stock: </label>
                <input type="number" name="stock" id="stock">
            </div>

            <div>
                <label for="category">Category: </label>
                <select name="category_id" id="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="image">Image</label>
                <input type="file" name="image" id="image">
            </div>

            <div><button type="submit">Add Product</button></div>
        </form>
    </div>
@endsection