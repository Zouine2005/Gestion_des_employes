<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function show(){
        $totalDepartements = Departement::all()->count();
        $totalEmployers = Employer::all()->count();
        $totalAdministateurs = User::all()->count();
        
        return view('dashboard',compact('totalDepartements','totalEmployers','totalAdministateurs'));
    }
}
