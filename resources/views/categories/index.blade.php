@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
    <h1>Daftar Kategori</h1>

    <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Tambah Kategori</a>

    <br><br>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-edit">Edit</a>

                        @if (auth()->user()->role === 'admin')
                            <form class="inline" method="POST"
                                  action="{{ route('categories.destroy', $category) }}"
                                  onsubmit="return confirm('Yakin hapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Hapus</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Belum ada kategori.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection