@extends('layouts.template')

@section('content')
<h1>Modifier Profil</h1>
<form method="POST" action="{{ route('profile.update', $user->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nom</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Mot de Passe (laisser vide pour ne pas changer)</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirmer Mot de Passe</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Mettre à jour</button>
    <a href="{{ route('profile.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection
