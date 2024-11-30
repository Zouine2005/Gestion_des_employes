<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeRequest;
use App\Models\Departement;
use App\Models\Employer;
use Illuminate\Http\Request;
use Exception; // Import Exception class


class EmployerController extends Controller
{
    public function index(){
        $employers= Employer::paginate(10);
        return view('employers.index',compact('employers'));
    }
    public function create(){
        $departements = Departement::all();
        return view('employers.create',compact('departements'));
    }
    public function store(StoreEmployeRequest $request)
{
    try {
        // Création d'un nouvel employé
        $employer = new Employer();
        $employer->nom = $request->input('frist_name');
        $employer->prenom = $request->input('last_name');
        $employer->email = $request->input('email');
        $employer->contact = $request->input('phone');
        $employer->departement_id = $request->input('departement_id');
        $employer->montant_journalier = $request->input('montant_journalier');
        $employer->save();

        // Redirection avec message de succès
        return redirect()->route('employer.index')->with('success', 'Employé ajouté avec succès.');
    } catch (\Exception $e) {
        \Log::error('Erreur lors de l\'ajout de l\'employé : ' . $e->getMessage());
        return back()->withErrors(['error' => 'Erreur lors de l\'ajout de l\'employé.']);
    }
}
public function edit(Employer $employer)
{
    // Récupérer tous les départements
    $departements = Departement::all(); 
    
    // Passer l'employé et les départements à la vue
    return view('employers.edit', compact('employer', 'departements'));
}

public function update(Employer $employer, StoreEmployeRequest $request)
{
    try {
        $employer->prenom = $request->first_name;
        $employer->nom = $request->last_name;
        $employer->email = $request->email;
        $employer->contact = $request->phone;
        $employer->montant_journalier = $request->montant_journalier;
        $employer->departement_id = $request->departement_id; // Assurez-vous que ce champ existe
        
        $employer->save(); // Utilisez save() au lieu de update()

        // Redirection avec un message de succès
        return redirect()->route('employer.index')->with('success', 'Employé modifié avec succès.');
    } catch (Exception $e) {
        // Gérer les erreurs (journalisation)
        \Log::error($e->getMessage());

        // Redirection avec un message d'erreur générique
        return back()->withErrors(['error' => 'Une erreur est survenue lors de la mise à jour de l\'employé.']);
    }
}
    public function destroy($id)
    {
        $employer = Employer::findOrFail($id);
        $employer->delete();
    
        return redirect()->route('employer.index')->with('success', 'Employé supprimé avec succès');
    }
}
