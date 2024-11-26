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

    public function edit(Departement $departement)
    {
        return view('departement.edit', compact('departement'));
    }

    public function store(SaveDepartementRequest $request)
    {
        try {
         
            $departement = new Departement();
            $departement->name = $request->name;
           
            $departement->save();

            return redirect()->route('departement.index')->with('success', 'Departement created successfully.');
        } catch (Exception $e) {
            // Handle the exception (optional logging)
            \Log::error($e);
            return back()->withErrors(['error' => 'There was an error creating the departement.']);
        }
    }
}