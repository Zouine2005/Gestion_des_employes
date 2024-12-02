@extends('layouts.template')


@section('content')

<h1 class="app-page-title">Employes</h1>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-4">
        <h3 class="section-title">Ajouter</h3>
        <div class="section-intro">
        Remplissez le formulaire ci-dessous pour ajouter un nouvel employé à votre liste.
        
        </div>
    </div>
    <div class="col-12 col-md-8">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form class="settings-form" method="POST" action="{{ route('employer.store') }}">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="setting-input-1" class="form-label">Departement</label>
                        <select name="departement_id" id="departement_id" class="form-control">
                        <option value=""></option>
                        @foreach ($departements as $departement)
                        <option value="{{$departement->id}}">{{$departement->name}}</option>
                            
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="setting-input-1" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="setting-input-1" placeholder="Entrez le nom de l'employes" name="first_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="setting-input-2" class="form-label">Prenom</label>
                        <input type="text" class="form-control" id="setting-input-2" placeholder="Entrez le prenom de l'employes" name="last_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="setting-input-3" class="form-label">Email</label>
                        <input type="email" class="form-control" id="setting-input-3" name="email" placeholder="Entrez le email" required>
                    </div>
                    <div class="mb-3">
                        <label for="setting-input-3" class="form-label">Contact</label>
                        <input type="tel" class="form-control" id="setting-input-3" name="phone" placeholder="Entrez le contact" pattern="(05|06|07)[0-9]{8}" required>
                    </div>
                    <div class="mb-3">
                        <label for="setting-input-3" class="form-label">Montant a journalier</label>
                        <input type="number" class="form-control" id="setting-input-3" name="montant_journalier" placeholder="Entrez le montant journalier" pattern="(05|06|07)[0-9]{8}" required>
                    </div>
                  
                    <button type="submit" class="btn btn-outline-success">Enregistrer</button>
                </form>
            </div><!--//app-card-body-->
        </div><!--//app-card-->
    </div><!--//col-->
</div><!--//row-->





@endsection