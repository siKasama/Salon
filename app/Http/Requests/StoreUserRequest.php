<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'     => [
                'string',
                'required',
            ],
            'email'    => [
                'required',
                'unique:users',
            ],
            'password' => [
                'required',
                'min:5'
            ],
            'is_admin' => [ 'default:0']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Digite o nome',
            'name.string'   => 'Informe um nome válido',
            'email.required' => 'Digite o e-mail',
            'email.email' => 'Informe um e-mail válido',
            'email.unique' => 'Este e-mail já foi utilizado',
            'password.required' => 'Informe a senha',
            'password.min' => 'Senha deve ter no mínimo 5 caracteres'
        ];
    }
}
