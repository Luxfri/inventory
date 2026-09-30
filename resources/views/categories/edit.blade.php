t.blade · PHP
@extends('layouts.app')
 
@section('title', 'Edit Kategori')
 
@section('content')
    <h1>Edit Kategori</h1>
 
    <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf
        @method('PUT')
 
        <label>Nama Kategori</label>
        <input type="text" name="name" value="{{ old('name', $category->name) }}">
        @error('name') <div style="color:red">{{ $message }}</div> @enderror
 
        <br>
        <button class="btn btn-primary" type="submit">Update</button>
        <a href="{{ route('categories.index') }}">Batal</a>
    </form>
@endsection