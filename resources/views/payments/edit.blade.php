@extends('layouts.template')

@section('content')
<div class="container">
    <h1>Modifier le paiement</h1>

    <form action="{{ route('payments.update', $payment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="reference" class="form-label">Référence</label>
            <input type="text" name="reference" class="form-control" value="{{ old('reference', $payment->reference) }}" required>
        </div>

        <div class="mb-3">
            <label for="employer_id" class="form-label">Employé</label>
            <select name="employer_id" class="form-select" required>
                @foreach ($employers as $employer)
                    <option value="{{ $employer->id }}" 
                        @if($payment->employer_id == $employer->id) selected @endif>
                        {{ $employer->nom }} {{ $employer->prenom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Montant</label>
            <input type="number" step="0.01" name="amount" class="form-control" value="{{ old('amount', $payment->amount) }}" required>
        </div>

        <div class="mb-3">
            <label for="launch_date" class="form-label">Date de lancement</label>
            <input type="datetime-local" name="launch_date" class="form-control" value="{{ old('launch_date', \Carbon\Carbon::parse($payment->launch_date)->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="mb-3">
            <label for="done_time" class="form-label">Date de paiement (optionnel)</label>
            <input type="datetime-local" name="done_time" class="form-control" value="{{ old('done_time', \Carbon\Carbon::parse($payment->done_time)->format('Y-m-d\TH:i')) }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Statut</label>
            <select name="status" class="form-select" required>
                <option value="SUCCESS" @if($payment->status == 'SUCCESS') selected @endif>Succès</option>
                <option value="FAILED" @if($payment->status == 'FAILED') selected @endif>Échoué</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="month" class="form-label">Mois</label>
            <select name="month" class="form-select" required>
                @foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
                    <option value="{{ $month }}" @if($payment->month == $month) selected @endif>{{ $month }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Année</label>
            <input type="number" name="year" class="form-control" value="{{ old('year', $payment->year) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
</div>
@endsection
