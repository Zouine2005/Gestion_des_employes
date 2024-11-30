@extends('layouts.template')

@section('content')
<h1 class="app-page-title">Départements</h1>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-4">
        <h3 class="section-title">Ajouter</h3>
        <div class="section-intro">
            Remplissez le formulaire ci-dessous pour ajouter un nouveau département à votre liste.
        </div>
    </div>
    <div class="col-12 col-md-8">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form class="settings-form" method="POST" action="{{ route('departement.store') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="setting-input-1" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="setting-input-1" placeholder="Entrez le nom du département" name="name" required><br>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    </div>
                   
                    <button type="submit" class="btn btn-outline-success">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
