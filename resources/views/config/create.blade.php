@extends('layouts.template')

@section('content')
<h1 class="app-page-title">Configurations</h1>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-4">
        <h3 class="section-title">Ajouter une Configuration</h3>
        <div class="section-intro">
            Remplissez le formulaire ci-dessous pour ajouter une nouvelle configuration à votre liste. Les configurations vous permettent de personnaliser les paramètres de votre application selon vos besoins.
        </div>
    </div>
    <div class="col-12 col-md-8">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form class="settings-form" method="POST" action="{{ route('configurations.store') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="config_type" class="form-label">Type de Configuration</label>
                        <select name="type" id="config-type" class="form-select" required>
                            <option value="" disabled selected>Choisissez une option</option>
                            <option value="PAYMENT_DATE">Date de Payment</option>
                            <option value="APP_NAME">Nom de l'application</option>
                            <option value="DEVELOPPER_NAME">Equipe de développement</option>
                            <option value="ANOTHER">Autre Options</option>
                        </select>
                        @if ($errors->has('type'))
                        <div class="alert alert-danger mt-2">
                            {{ $errors->first('config_type') }}
                        </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="value" class="form-label">Valeur</label>
                        <input type="text" class="form-control" id="value" placeholder="Entrez la valeur de la configuration" name="value" required>
                        @if ($errors->has('value'))
                        <div class="alert alert-danger mt-2">
                            {{ $errors->first('value') }}
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