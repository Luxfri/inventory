@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
    <h1>Edit Produk</h1>

    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')

        <label>Kategori</label>
        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id') <div style="color:red">{{ $message }}</div> @enderror

        <label>Nama Produk</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}">
        @error('name') <div style="color:red">{{ $message }}</div> @enderror

        <label>Harga</label>
        <input type="number" name="price" value="{{ old('price', $product->price) }}">
        @error('price') <div style="color:red">{{ $message }}</div> @enderror

        <label>Stok</label>
        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}">
        @error('stock') <div style="color:red">{{ $message }}</div> @enderror

        <br>
        <button class="btn btn-primary" type="submit">Update</button>
        <a href="{{ route('products.index') }}">Batal</a>
    </form>
@endsection