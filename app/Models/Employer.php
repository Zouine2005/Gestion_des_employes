<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'nom', 'prenom', 'email', 'contact', 'departement_id'
    ];

    /**
     * Un employé peut avoir plusieurs paiements.
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

}


