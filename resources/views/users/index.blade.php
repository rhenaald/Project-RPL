<x-app-layout>
{{-- {{ dd ($users) }} --}}
    <h1>Daftar Users</h1>


<a href="{{ route('users.create') }}">Tambah User</a>
 <h1>Daftar Users dan Role</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roles[0]['name'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
