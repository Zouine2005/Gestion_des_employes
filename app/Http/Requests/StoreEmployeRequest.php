<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "departement_id" => 'required|exists:departements,id|integer',
            "first_name" => 'required|string',
            "last_name" => 'required|string',
            "email" => 'required|unique:employers,email',
            "phone" => 'required|unique:employers,contact',
            "montant_journalier" => 'required|numeric|min:3'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Le mail est requis',
            'email.unique' => 'Le mail est déjà pris',
            'phone.required' => 'Le numéro de téléphone est requis',
            'phone.unique' => 'Le numéro de téléphone est déjà utilisé',
        ];
    }
}
