<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Employer;
use Illuminate\Http\Request;
use Exception;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::with('employee')->paginate(10); // Correction de la relation
        return view('leaves.index', compact('leaves'));
    }

    public function create()
    {
        $employees = Employer::all(); // Pour afficher les employés dans la liste déroulante
        return view('leaves.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employer_id' => 'required|exists:employers,id', // Correction de la clé étrangère
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'nullable|in:EN ATTENTE,APPROUVÉ,REJETÉ', // Ajout de la validation pour le statut
        ]);

        try {
            Leave::create($validatedData);
            return redirect()->route('leaves.index')->with('success', 'Congé ajouté avec succès.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'Erreur : ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $leave = Leave::findOrFail($id);
        $employees = Employer::all();
        return view('leaves.edit', compact('leave', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'employer_id' => 'required|exists:employers,id', // Correction de la clé étrangère
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'nullable|in:EN ATTENTE,APPROUVÉ,REJETÉ', // Validation du statut
        ]);

        try {
            $leave = Leave::findOrFail($id);
            $leave->update($validatedData);
            return redirect()->route('leaves.index')->with('success', 'Congé mis à jour avec succès.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'Erreur : ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $leave = Leave::findOrFail($id);
            $leave->delete();
            return redirect()->route('leaves.index')->with('success', 'Congé supprimé avec succès.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'Erreur : ' . $e->getMessage()]);
        }
    }
}
