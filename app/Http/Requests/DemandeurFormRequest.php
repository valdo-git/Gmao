<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DemandeurFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;// a chger si on veut tester la capacité à réaliser l'action
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom_demandeur' => 'required|unique:demandeurs|max:255',
            'type_demandeur' => 'max:255',
        ];
    }
}
