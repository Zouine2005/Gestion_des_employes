@extends('layouts.template')

@section('content')
<h1 class="app-page-title">Modifier la Configuration</h1>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-4">
        <h3 class="section-title">Modifier la Configuration</h3>
        <div class="section-intro">
            Modifiez les informations ci-dessous pour mettre à jour la configuration existante.
        </div>
    </div>
    <div class="col-12 col-md-8">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form class="settings-form" method="POST" action="{{ route('configuration.update', $configuration->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="config_type" class="form-label">Type de Configuration</label>
                        <select name="type" id="config_type" class="form-select" required>
                            <option value=""></option>
                            <option value="PAYMENT_DATE" {{ $configuration->type == 'PAYMENT_DATE' ? 'selected' : '' }}>Date de Payment</option>
                            <option value="APP_NAME" {{ $configuration->type == 'APP_NAME' ? 'selected' : '' }}>Nom de l'application</option>
                            <option value="DEVELOPPER_NAME" {{ $configuration->type == 'DEVELOPPER_NAME' ? 'selected' : '' }}>Équipe de développement</option>
                            <option value="ANOTHER" {{ $configuration->type == 'ANOTHER' ? 'selected' : '' }}>Autres Options</option>
                        </select>
                        @if ($errors->has('type'))
                            <div class="alert alert-danger mt-2">
                                {{ $errors->first('type') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="value" class="form-label">Valeur</label>
                        <input type="text" class="form-control" id="value" placeholder="Entrez la valeur de la configuration" name="value" value="{{ old('value', $configuration->value) }}" required>
                        @if ($errors->has('value'))
                            <div class="alert alert-danger mt-2">
                                {{ $errors->first('value') }}
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-outline-success">Mettre à jour</button>
                    <a href="{{ route('configurations.index') }}" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection