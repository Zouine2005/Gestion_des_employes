<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être attribués en masse.
     *
     * @var array
     */
    protected $fillable = [
        'reference',
        'employer_id',
        'amount',
        'launch_date',
        'done_time',
        'status',
        'month',
        'year',
    ];

    /**
     * Récupère l'employé associé au paiement.
     */
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    /**
     * Formater la date de lancement.
     */
    public function getLaunchDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    /**
     * Formater la date de paiement.
     */
    public function getDoneTimeAttribute($value)
    {
        return $value ? \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s') : null;
    }
}
