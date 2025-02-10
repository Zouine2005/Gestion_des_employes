@extends('layouts.template')

@section('content')

<div class="container">
    <h1 class="app-page-title mb-4">Modifier votre Profil</h1>
    
    <!-- Form container with card styling -->
    <div class="row g-4">
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <!-- Profile update form -->
                    <form method="POST" action="{{ route('profile.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Name input field -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                        </div>

                        <!-- Email input field -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                        </div>

                        <!-- Password input field (optional) -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de Passe (laisser vide pour ne pas changer)</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <!-- Password confirmation input field -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmer Mot de Passe</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>

                        <!-- Submit and cancel buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-outline-success">Mettre à jour</button>
                            <a href="{{ route('profile.index') }}" class="btn btn-outline-secondary">Annuler</a>
                        </div>
                    </form>
                </div><!--//app-card-body-->
            </div><!--//app-card-->
        </div><!--//col-->
    </div><!--//row-->
</div><!--//container-->

@endsection