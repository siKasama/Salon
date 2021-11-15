<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()  {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()  {
        return [
            'name'     => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'email',
            ],
            'fone' => [
                'required',
                'numeric'
            ],
            'city' => [
                'string',
                'required'
            ],
            'uf' => [
                'string',
                'required'
            ]
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
