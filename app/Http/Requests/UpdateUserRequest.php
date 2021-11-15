<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array  {
        return [
            'name'     => [
                'string',
                'required',
            ],
            'email'    => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'password' => 'nullable|min:5',
            'is_admin' => 'required,' . request()->route('user')->types,
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array  {
        return [
            'name.required' => 'Digite o nome',
            'name.string'   => 'Informe um nome válido',
            'email.required' => 'Digite o e-mail',
            'email.email' => 'Informe um e-mail válido',
            'email.unique' => 'Este e-mail já foi utilizado',
            'password.min' => 'Senha deve ter no mínimo 5 caracteres'
        ];
    }
}
