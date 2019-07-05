<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DossierFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'numero' => 'bail|required|unique:dossiers',
            'designation' => 'bail|required|max:255',
            'date_ouverture' => 'bail|date',
            'date_fermeture' => 'bail|date'
        ];
    }
}
