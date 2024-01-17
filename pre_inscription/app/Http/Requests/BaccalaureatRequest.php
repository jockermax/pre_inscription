<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use function Symfony\Component\Translation\t;

class BaccalaureatRequest extends FormRequest
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
            'paysEtudeBaccalaureat' => 'required|string|max:255',
            'villeEtude' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'etablissement' => 'required|string|max:255',
            'programme' => 'required|string|max:255',
            'relever' => 'required|file|mimes:pdf,jpeg,png,bmp,gif,svg,doc,docx',
            'diplome' => 'required|file|mimes:pdf,jpeg,png,bmp,gif,svg,doc,docx',

        ];
    }
}
