@extends('layouts.template')

@section('content')
<h1>Liste des Utilisateurs</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-sm btn-primary">Modifier</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
