@extends('layouts.template')

@section('content')

<h1 class="app-page-title">Congés</h1>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-4">
        <h3 class="section-title">Ajouter</h3>
        <div class="section-intro">
            Remplissez le formulaire ci-dessous pour ajouter un nouveau congé pour un employé.
        </div>
    </div>
    <div class="col-12 col-md-8">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form class="settings-form" method="POST" action="{{ route('leaves.store') }}">
                    @csrf
                    @method('POST')

                    <!-- Champ pour sélectionner un employé -->
                    <div class="mb-3">
                        <label for="employer_id" class="form-label">Employé</label>
                        <select name="employer_id" id="employer_id" class="form-control" required>
                            <option value="" disabled selected>Choisissez un employé</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">
                                    {{ $employee->nom }} {{ $employee->prenom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Champ pour la date de début -->
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Date de Début</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>

                    <!-- Champ pour la date de fin -->
                    <div class="mb-3">
                        <label for="end_date" class="form-label">Date de Fin</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                    </div>

                    <!-- Champ pour le statut initial -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Statut</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="EN ATTENTE">EN ATTENTE</option>
                            <option value="APPROUVÉ">APPROUVÉ</option>
                            <option value="REJETÉ">REJETÉ</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-outline-success">Enregistrer</button>
                </form>
            </div><!--//app-card-body-->
        </div><!--//app-card-->
    </div><!--//col-->
</div><!--//row-->

@endsection
