<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'start_date',
        'end_date',
        'status',
    ];

    // Relation avec l'employé
    public function employee()
    {
        return $this->belongsTo(Employer::class);
    }
}
