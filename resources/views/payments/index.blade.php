@extends('layouts.template')

@section('content')
<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Paiements</h1>
    </div>
    <div class="col-auto">
        <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">
                    <form class="table-search-form row gx-1 align-items-center" method="GET" action="{{ route('payments.index') }}">
                        <div class="col-auto">
                            <input type="text" id="search-payments" name="searchpayments" 
                                   class="form-control search-orders" 
                                   placeholder="Rechercher par référence ou employé" 
                                   value="{{ request('searchpayments') }}">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn app-btn-secondary">Rechercher</button>
                        </div>
                    </form>
                </div>
                <div class="col-auto">
                    <a class="btn app-btn-secondary" href="{{ route('payments.create') }}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0z"/>
                            <path d="M4 8a.5.5 0 0 1 .5-.5H7.5V4a.5.5 0 0 1 1 0v3.5H11a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8.5H4.5a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        Ajouter Paiement
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="tab-content" id="payments-table-tab-content">
    <div class="tab-pane fade show active" id="payments-all" role="tabpanel">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">ID</th>
                                <th class="cell">Référence</th>
                                <th class="cell">Employé</th>
                                <th class="cell">Montant</th>
                                <th class="cell">Date de lancement</th>
                                <th class="cell">Statut</th>
                                <th class="cell">Mois</th>
                                <th class="cell">Année</th>
                                <th class="cell">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($payments as $payment)
                            <tr>
                                <td class="cell">{{ $payment->id }}</td>
                                <td class="cell">{{ $payment->reference }}</td>
                                <td class="cell">{{ $payment->employer->nom ?? 'N/A' }} {{ $payment->employer->prenom ?? '' }}</td>
                                <td class="cell">{{ $payment->amount }}</td>
                                <td class="cell">{{ $payment->launch_date }}</td>
                                <td class="cell">{{ $payment->status }}</td>
                                <td class="cell">{{ $payment->month }}</td>
                                <td class="cell">{{ $payment->year }}</td>
                                <td class="cell">
                                    <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                    <form action="{{ route('payments.delete', $payment->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet paiement ?')">
                                            Supprimer
                                        </button>
                                        <a href="{{ route('payments.pdf', $payment->id) }}" class="btn btn-secondary btn-sm">Télécharger PDF</a>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center">Aucun paiement trouvé</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection