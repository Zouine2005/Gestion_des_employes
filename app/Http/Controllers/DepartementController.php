<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement; // Import the Departement model
use App\Http\Requests\SaveDepartementRequest; // Import the request class
use Exception; // Import Exception class

class DepartementController extends Controller
{
    public function index()
    {
        $departement = Departement::paginate(10);
        return view('departement.index', compact('departement'));
    }

    public function create()
    {
        return view('departement.create');
    }

    

    public function store(Departement $departement,SaveDepartementRequest $request)
{
    try {
        // Validation pour s'assurer que le nom est unique
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:departements,name',
        ], [
            'name.required' => 'Le champ nom est obligatoire.',
            'name.unique' => 'Le nom du département existe déjà.',
        ]);

        // Création du département
        $departement = new Departement();
        $departement->name = $validatedData['name'];
        $departement->save();

        // Redirection avec un message de succès
        return redirect()->route('departement.index')->with('success', 'Département enregistré avec succès.');
    } catch (Exception $e) {
        // Gérer les erreurs (par exemple : journalisation)
        \Log::error($e->getMessage());

        // Redirection avec un message d'erreur générique
        return back()->withErrors(['error' => 'Une erreur est survenue lors de la création du département.']);
    }

}
    public function edit(Departement $departement)
    {
            return view('departement.edit', compact('departement'));
    }
    public function update(Departement $departement,SaveDepartementRequest $request)
    {
        try {
            $departement->name = $request->name;
            $departement->update();
    
            // Redirection avec un message de succès
            return redirect()->route('departement.index')->with('success', 'Département a ete modifie.');
        } catch (Exception $e) {
            // Gérer les erreurs (par exemple : journalisation)
            \Log::error($e->getMessage());
    
            // Redirection avec un message d'erreur générique
            return back()->withErrors(['error' => 'Une erreur est survenue lors de la création du département.']);
        }
    
    }
    public function delete(Departement $departement)
    {
        try {
            $departement->delete();
    
            // Redirection avec un message de succès
            return redirect()->route('departement.index')->with('success', 'Département a ete supprime.');
        } catch (Exception $e) {
            // Gérer les erreurs (par exemple : journalisation)
            \Log::error($e->getMessage());
    
            // Redirection avec un message d'erreur générique
            return back()->withErrors(['error' => 'Une erreur est survenue lors de la création du département.']);
        }
    
    }


}