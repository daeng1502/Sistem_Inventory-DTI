<!-- resources/views/user/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user.update', $user->id) }}" method="post">
        @csrf
        @method('PATCH')
        <label for="name">Nama:</label>
        <input type="text" name="name" value="{{ $user->name }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" required>

        <label for="password">Password (kosongkan jika tidak ingin mengubah):</label>
        <input type="password" name="password">

        <label for="usertype">Tipe User:</label>
        <select name="usertype" required>
            <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>

        <button type="submit">Perbarui User</button>
    </form>

    <a href="{{ route('user.index') }}">Kembali</a>
@endsection
