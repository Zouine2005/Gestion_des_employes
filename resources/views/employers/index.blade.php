@extends('layouts.template')
@section('content')
<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Employes</h1>
    </div>
    <div class="col-auto">
         <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">
                    <form class="table-search-form row gx-1 align-items-center" method="GET" action="{{ route('employer.index') }}">
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
                    
                </div><!--//col-->
                <div class="col-auto">
                    
                    <select class="form-select w-auto" >
                          <option selected value="option-1">All</option>
                          <option value="option-2">This week</option>
                          <option value="option-3">This month</option>
                          <option value="option-4">Last 3 months</option>
                          
                    </select>
                </div>
                <div class="col-auto">						    
                    <a class="btn app-btn-secondary" href="{{route('employer.create')}}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
<path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
</svg>
                        Ajouter Employe
                    </a>
                </div>
            </div><!--//row-->
        </div><!--//table-utilities-->
    </div><!--//col-auto-->
</div><!--//row-->



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
                                <th class="cell">Prénom</th>
                                <th class="cell">Email</th>
                                <th class="cell">Contact</th>
                                <th class="cell">Montant Journalier</th>
                                <th class="cell">Departement</th>
                                <th class="cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employers as $item)
                            <tr>
                                <td class="cell">{{ $item->id }}</td>
                                <td class="cell">{{ $item->nom }}</td>
                                <td class="cell">{{ $item->prenom }}</td>
                                <td class="cell">{{ $item->email }}</td>
                                <td class="cell">{{ $item->contact }}</td>
                                <td class="cell">{{ $item->montant_journalier }}</td>
                                <td class="cell">
                                    {{ $item->departement ? $item->departement->name : 'Aucun département' }}
                                </td>
                                <td class="cell">
                                    <!-- Bouton Modifier -->
                                    <a href="{{ route('employer.edit', $item->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                        
                                    <!-- Formulaire Supprimer -->
                                    <form action="{{ route('employer.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Aucun employé ajouté</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div><!--//table-responsive-->
               
            </div><!--//app-card-body-->		
        </div><!--//app-card-->
     
        <nav class="app-pagination">
            {{$employers->links()}}
        </nav><!--//app-pagination-->
        
    </div><!--//tab-pane-->
    
   
</div><!--//tab-content-->

@endsection