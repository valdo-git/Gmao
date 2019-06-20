<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtelierFormRequest extends FormRequest
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
            'nom_atelier' => 'unique:ateliers|required|max:255',
            'nom_chef' => 'unique:ateliers|required|max:255',
        ];
    }
}
