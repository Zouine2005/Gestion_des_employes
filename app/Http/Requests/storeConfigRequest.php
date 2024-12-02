<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeConfigRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Autoriser toutes les requêtes
    }

    public function rules(): array
    {
        return [
            'type' => 'required|in:PAYMENT_DATE,APP_NAME,DEVELOPPER_NAME,ANOTHER',
            'value' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'type.required' => 'Le type de configuration est requis.',
            'type.unique' => 'Cette configuration existe déjà.',
            'value.required' => 'La valeur est requise.',
            'value.string' => 'La valeur doit être une chaîne de caractères.',
            'value.max' => 'La valeur ne peut pas dépasser 255 caractères.',
        ];
    }
}