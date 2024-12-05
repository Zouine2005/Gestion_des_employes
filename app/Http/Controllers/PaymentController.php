<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Employer;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Afficher la liste des paiements.
     */
    public function index()
    {
        $payments = Payment::with('employer')->get(); // Charger les relations avec les employeurs
        return view('payments.index', compact('payments'));
    }

    /**
     * Afficher le formulaire de création d'un paiement.
     */
    public function create()
    {
        $employers = Employer::all(); // Charger tous les employeurs pour la liste déroulante
        return view('payments.create', compact('employers'));
    }

    /**
     * Stocker un nouveau paiement.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'reference' => 'required|string',
        'employer_id' => 'required|exists:employers,id', // Vérifier si l'employé existe
        'amount' => 'required|numeric',
        'launch_date' => 'required|date',
        'done_time' => 'nullable|date',
        'status' => 'required|in:SUCCESS,FAILED',
        'month' => 'required|in:January,February,March,April,May,June,July,August,September,October,November,December',
        'year' => 'required|digits:4',
    ]);

    // Création du paiement
    Payment::create($validated);

    return redirect()->route('payments.index')->with('success', 'Paiement ajouté avec succès');
}

    /**
     * Afficher le formulaire d'édition d'un paiement.
     */
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $employers = Employer::all();
        return view('payments.edit', compact('payment', 'employers'));
    }

    /**
     * Mettre à jour un paiement existant.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'reference' => 'required|string',
            'employer_id' => 'required|exists:employers,id', // Vérifier si l'employé existe
            'amount' => 'required|numeric',
            'launch_date' => 'required|date',
            'done_time' => 'nullable|date',
            'status' => 'required|in:SUCCESS,FAILED',
            'month' => 'required|in:January,February,March,April,May,June,July,August,September,October,November,December',
            'year' => 'required|digits:4',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->update($validated);

        return redirect()->route('payments.index')->with('success', 'Paiement mis à jour avec succès.');
    }
}
