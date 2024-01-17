<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class secondeRequest extends FormRequest
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
            'paysEtudeSeconde' => 'required|string|max:255',
            'villeEtude' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'etablissement' => 'required|string|max:255',
            'programme' => 'required|string|max:255',
            'BultinSeconde' => 'required|file|mimes:pdf,jpeg,png,bmp,gif,svg,doc,docx',

        ];
    }
}
