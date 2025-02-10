@extends('layouts.template')

@section('content')
<h1 class="app-page-title">Modifier Congé</h1>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-4">
        <h3 class="section-title">Modifier les informations du congé</h3>
        <div class="section-intro">
            Remplissez le formulaire ci-dessous pour mettre à jour les informations du congé.
        </div>
    </div>
    <div class="col-12 col-md-8">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form class="settings-form" method="POST" action="{{ route('leaves.update', $leave->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Champ pour sélectionner l'employé -->
                    <div class="mb-3">
                        <label for="employer_id" class="form-label">Employé</label>
                        <select name="employer_id" id="employer_id" class="form-control" required>
                            <option value="">Sélectionnez un employé</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}" {{ $leave->employer_id == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->nom }} {{ $employee->prenom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Champ pour la date de début -->
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Date de Début</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $leave->start_date }}" required>
                    </div>

                    <!-- Champ pour la date de fin -->
                    <div class="mb-3">
                        <label for="end_date" class="form-label">Date de Fin</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $leave->end_date }}" required>
                    </div>

                    <!-- Champ pour le statut -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Statut</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="EN ATTENTE" {{ $leave->status == 'EN ATTENTE' ? 'selected' : '' }}>EN ATTENTE</option>
                            <option value="APPROUVÉ" {{ $leave->status == 'APPROUVÉ' ? 'selected' : '' }}>APPROUVÉ</option>
                            <option value="REJETÉ" {{ $leave->status == 'REJETÉ' ? 'selected' : '' }}>REJETÉ</option>
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
