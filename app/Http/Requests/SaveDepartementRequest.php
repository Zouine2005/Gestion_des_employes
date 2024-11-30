<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveDepartementRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust authorization logic as needed
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:departements,name', // Example rule
        ];
    }

    public function message(){
        return[
            'name.required'=> 'le nom du departement est requis',
            'name.unique'=> 'le nom du departement existe deja'
        ];
    }
}