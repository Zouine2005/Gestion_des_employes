@extends('layouts.template')

@section('content')

<h1 class="app-page-title">Ajouter un Paiement</h1>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-4">
        <h3 class="section-title">Ajouter un Paiement</h3>
        <div class="section-intro">
            Remplissez le formulaire ci-dessous pour ajouter un paiement à votre système.
        </div>
    </div>
    <div class="col-12 col-md-8">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form class="settings-form" method="POST" action="{{ route('payments.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="reference" class="form-label">Référence</label>
                        <input type="text" name="reference" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="employer_id" class="form-label">Employé</label>
                        <select name="employer_id" class="form-select" required>
                            <option value="">Choisir un employee</option>
                            @foreach ($employers as $employer)
                                <option value="{{ $employer->id }}">{{ $employer->nom }} {{ $employer->prenom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Montant</label>
                        <input type="number" step="0.01" name="amount" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="launch_date" class="form-label">Date de lancement</label>
                        <input type="datetime-local" name="launch_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="done_time" class="form-label">Date de fini</label>
                        <input type="datetime-local" name="done_time" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Statut</label>
                        <select name="status" class="form-select" required>
                            <option value="SUCCESS">Succès</option>
                            <option value="FAILED">Échoué</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="month" class="form-label">Mois</label>
                        <select name="month" class="form-select" required>
                            @foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
                                <option value="{{ $month }}">{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Année</label>
                        <input type="number" name="year" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Enregistrer</button>
                </form>
            </div><!--//app-card-body-->
        </div><!--//app-card-->
    </div><!--//col-->
</div><!--//row-->

@endsection