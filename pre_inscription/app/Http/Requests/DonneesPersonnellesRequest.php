<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonneesPersonnellesRequest extends FormRequest
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
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|in:M,F',
            'date_naissance' => 'required|date',
            'telephone' => 'required|string',
            'pays_naissance' => 'required|string|max:255',
            'ville_naissance' => 'required|string|max:255',
            'pays_residence' => 'required|string|max:255',
            'status_legal' => 'required|string|max:255',
            'langue_maternelle' => 'required|string|max:255',
            'langue_parlee' => 'required|string|max:255',
            'email' => 'string|email|max:255|unique:donnees_personnelles'
        ];
    }
}
