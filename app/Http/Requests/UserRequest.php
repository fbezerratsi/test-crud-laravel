<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'nome' => 'required|min:5|max:60',
            'cpf' => 'required|min:11|max:11',
            'data_nascimento' => 'required',
            'sexo' => 'required',
            'altura' => 'required',
        ];
    }

    public function messages() {

        return [
            'nome.required' => 'Inserir um nome',
            'nome.min' => 'Campo NOME menor que o esperado',
            'nome.max' => 'Campo NOME maior que o esperado',
            'cpf.min' => 'Campo CPF com valor diferente do esperado',
            'cpf.max' => 'Campo CPF com valor diferente do esperado',
        ];
    }
}
