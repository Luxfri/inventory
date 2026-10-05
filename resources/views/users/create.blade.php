@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
    <h1>Tambah User</h1>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <label>Nama</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <div style="color:red">{{ $message }}</div> @enderror

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <div style="color:red">{{ $message }}</div> @enderror

        <label>Password</label>
        <input type="password" name="password">
        @error('password') <div style="color:red">{{ $message }}</div> @enderror

        <label>Role</label>
        <select name="role">
            <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>Staff</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
        @error('role') <div style="color:red">{{ $message }}</div> @enderror

        <br>
        <button class="btn btn-primary" type="submit">Simpan</button>
        <a href="{{ route('users.index') }}">Batal</a>
    </form>
@endsection