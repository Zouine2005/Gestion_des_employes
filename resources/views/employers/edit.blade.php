@extends('layouts.template')

@section('content')
<h1 class="app-page-title">Modifier Employé</h1>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-4">
        <h3 class="section-title">Modifier les informations de l'employé</h3>
        <div class="section-intro">
            Remplissez le formulaire ci-dessous pour mettre à jour les informations de l'employé.
        </div>
    </div>
    <div class="col-12 col-md-8">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form class="settings-form" method="POST" action="{{ route('employer.update', $employer->id) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="first_name" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="first_name" placeholder="Entrez le prénom" name="first_name" value="{{ $employer->first_name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Nom de Famille</label>
                        <input type="text" class="form-control" id="last_name" placeholder="Entrez le nom de famille" name="last_name" value="{{ $employer->last_name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Entrez l'email" name="email" value="{{ $employer->email }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" id="phone" placeholder="Entrez le numéro de téléphone" name="phone" value="{{ $employer->phone }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="montant_journalier" class="form-label">Montant Journalier</label>
                        <input type="number" class="form-control" id="montant_journalier" placeholder="Entrez le montant journalier" name="montant_journalier" value="{{ $employer->montant_journalier }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="departement_id" class="form-label">Département</label>
                        <select class="form-select" id="departement_id" name="departement_id" required>
                            <option value="">Sélectionnez un département</option>
                            @foreach ($departements as $departement)
                                <option value="{{ $departement->id }}" {{ $employer->departement_id == $departement->id ? 'selected' : '' }}>
                                    {{ $departement->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <button type="submit" class="btn btn-outline-success">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection