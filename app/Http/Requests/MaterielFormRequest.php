<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterielFormRequest extends FormRequest
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
            'numImmat' => 'nullable|unique:materiels|max:255',
            'codeProduit' => 'nullable|unique:materiels|max:255',
        ];
    }
}
