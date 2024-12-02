<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration; // Assurez-vous que le modèle est importé
use App\Http\Requests\StoreConfigRequest; // Notez la convention de nommage
use Exception;

class ConfigurationController extends Controller
{
    public function index()
{
    $allConfigurations = Configuration::latest()->paginate(10); // Pour vérifier si des données sont récupérées
    return view('config.index', compact('allConfigurations'));
}
    public function create()
    {
        return view('config/create');
    }

    public function store(storeConfigRequest $request)
{
    try {
        \Log::info('Données reçues :', $request->all()); // Ajout pour debug
        
        // Créer une nouvelle configuration avec les données validées
        Configuration::create($request->validated());

        return redirect()->route('configurations.index')->with('success_message', 'Configuration ajoutée avec succès.');
    } catch (Exception $e) {
        \Log::error('Erreur lors de l\'enregistrement : ' . $e->getMessage()); // Ajout pour debug
        return redirect()->back()->withErrors(['message' => 'Erreur lors de l\'enregistrement de la configuration : ' . $e->getMessage()]);
    }
}
public function edit($id)
{
    $configuration = Configuration::findOrFail($id); // Trouve la configuration ou retourne une 404
    return view('config.edit', compact('configuration')); // Vue pour l'édition
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'type' => 'required|in:PAYMENT_DATE,APP_NAME,DEVELOPPER_NAME,ANOTHER',
        'value' => 'required|string|max:255',
    ]);

    try {
        $configuration = Configuration::findOrFail($id);
        $configuration->update($validatedData);

        return redirect()->route('configurations.index')->with('success', 'Configuration mise à jour avec succès.');
    } catch (Exception $e) {
        return redirect()->back()->withErrors(['message' => 'Erreur lors de la mise à jour : ' . $e->getMessage()]);
    }
}
public function destroy($id)
{
    try {
        $configuration = Configuration::findOrFail($id);
        $configuration->delete();

        return redirect()->route('configurations.index')->with('success', 'Configuration supprimée avec succès.');
    } catch (Exception $e) {
        return redirect()->back()->withErrors(['message' => 'Erreur lors de la suppression : ' . $e->getMessage()]);
    }
}

}