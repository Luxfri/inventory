@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>Kategori: {{ $product->category->name }}</p>
    <p>Harga: Rp{{ number_format($product->price, 0, ',', '.') }}</p>
    <p>Stok: {{ $product->stock }}</p>
    <a href="{{ route('products.index') }}">Kembali</a>
@endsection