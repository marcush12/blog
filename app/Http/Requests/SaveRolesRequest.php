<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveRolesRequest extends FormRequest
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
        $rules = [
            'display_name'=>'required'
        ];

        if ($this->method() !== 'PUT') {
            $rules['name'] = 'required|unique:roles';
        }
        return $rules;
    }
    public function messages(){
        return [
            'name.required'=>'O identificador do papel é obrigatório.',//se falhar acima, exibir msg
            'name.unique'=>'Este identificador já está em uso.',
            'display_name.required'=>'O nome do papel é obrigatório.'
        ];
    }
}
