<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
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
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'min:3'
            ],
            'email' => [
                'required', 'email', Rule::unique((new User)->getTable())->ignore($this->route()->user->id ?? null)
            ],
            'password' => [
                $this->route()->user ? 'nullable' : 'required', 'confirmed', 'min:5'
            ],
            'is_admin' => [
                'required', 'default: false'
            ],
        ];
    }

    public function messages(): array  {
        return [
            'name.required' => 'Digite o nome',
            'name.string'   => 'Informe um nome válido',
            'email.required' => 'Digite o e-mail',
            'email.email' => 'Informe um e-mail válido',
            'email.unique' => 'Este e-mail já foi utilizado',
            'password.required' => 'Informe a senha',
            'password.min' => 'Senha deve ter no mínimo 8 caracteres'
        ];
    }
}
