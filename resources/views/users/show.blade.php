@extends('layouts.app')

@section('content')
<h1>Detail User</h1>

<p><strong>Name:</strong> {{ $user->name }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Role:</strong> {{ $user->roles->pluck('name')->implode(', ') }}</p>

<a href="{{ route('users.index') }}">Kembali ke Daftar User</a>
@endsection
