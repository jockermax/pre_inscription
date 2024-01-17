<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FiliereRequest extends FormRequest
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
            'nomFiliere' => 'required|min:2|unique:filieres,nomFiliere',
            'cout' => 'required|numeric',
            'mensualite' => 'required|numeric',
            'duree' => 'required|numeric',
            'departement_id'=>'required|exists:departements,id'
        ];
    }
}
