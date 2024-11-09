@extends('layouts.app')

@section('content')
<h1>Edit User</h1>

<form action="{{ route('users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')
    
    <label>Name:</label>
    <input type="text" name="name" value="{{ $user->name }}" required>
    
    <label>Email:</label>
    <input type="email" name="email" value="{{ $user->email }}" required>
    
    <label>Password (kosongkan jika tidak ingin mengubah):</label>
    <input type="password" name="password">
    
    <label>Role:</label>
    <select name="role" required>
        @foreach($roles as $role)
        <option value="{{ $role->name }}" {{ $user->roles->contains('name', $role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
        @endforeach
    </select>

    <button type="submit">Perbarui</button>
</form>
@endsection
