@extends('layouts.template')
@section('content')
<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Departement</h1>
    </div>
    <div class="col-auto">
         <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">
                    <form class="table-search-form row gx-1 align-items-center" method="GET" action="{{ route('departement.index') }}">
                        <div class="col-auto">
                            <input type="text" id="search-orders" name="searchorders" 
                                   class="form-control search-orders" 
                                   placeholder="Rechercher par nom" 
                                   value="{{ request('searchorders') }}">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn app-btn-secondary">Rechercher</button>
                        </div>
                    </form>
                    
                </div>
                <div class="col-auto">						    
                    <a class="btn app-btn-secondary" href="{{route('departement.create')}}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0z"/>
                            <path d="M4 8a.5.5 0 0 1 .5-.5H7.5V4a.5.5 0 0 1 1 0v3.5H11a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8.5H4.5a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        Ajouter Departement
                    </a>
                </div>
            </div><!--//row-->
        </div><!--//table-utilities-->
    </div><!--//col-auto-->
</div><!--//row-->
{{-- Afficher le message de succès --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif




<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">#</th>
                                <th class="cell">Nom</th>
                                <th class="cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($departement as $item)
                            <tr>
                                <td class="cell">{{ $item->id }}</td>
                                <td class="cell"><span class="truncate">{{ $item->name }}</span></td>
                                <td class="cell">
                                    <a href="{{ route('departement.edit', $item->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                    <form action="{{ route('departement.delete', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet departement ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">Aucun département ajouté</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div><!--//table-responsive-->
               
            </div><!--//app-card-body-->		
        </div><!--//app-card-->
        <nav class="app-pagination">
            {{$departement->links()}}
        </nav><!--//app-pagination-->
        
    </div><!--//tab-pane-->

@endsection