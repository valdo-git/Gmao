<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmplacementFormRequest extends FormRequest
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
            'designation' => 'unique:emplacements|required|max:255',
            'gisement' => 'unique:emplacements|max:255',
            'observations' => 'max:255',
        ];
    }
}
