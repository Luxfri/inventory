@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <h1>Tambah Kategori</h1>

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf

        <label>Nama Kategori</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <div style="color:red">{{ $message }}</div> @enderror

        <br>
        <button class="btn btn-primary" type="submit">Simpan</button>
        <a href="{{ route('categories.index') }}">Batal</a>
    </form>
@endsection