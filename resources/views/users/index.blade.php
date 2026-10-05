@extends('layouts.app')

@section('title', 'Kelola User')

@section('content')
    <h1>Kelola User</h1>

    <a href="{{ route('users.create') }}" class="btn btn-primary">+ Tambah User</a>

    <br><br>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        @if ($user->id !== auth()->id())
                            @if ($user->role === 'staff')
                                <form class="inline" method="POST" action="{{ route('users.promote', $user) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-primary" type="submit">Jadikan Admin</button>
                                </form>
                            @else
                                <form class="inline" method="POST" action="{{ route('users.demote', $user) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-edit" type="submit">Jadikan Staff</button>
                                </form>
                            @endif

                            <form class="inline" method="POST"
                                  action="{{ route('users.destroy', $user) }}"
                                  onsubmit="return confirm('Yakin hapus akun ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Hapus</button>
                            </form>
                        @else
                            <span style="color:#999">Akun kamu sendiri</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada user.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection