<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
    public function rules()   {
        return [
            'name'     => [
                'string',
                'required',
            ],
            'price' => [
                'required',
                'numeric', 'min:1','max:499.99', 
                'regex:/^\d+(\.\d{1,2})?$/'
            ]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array  {
        return [
            'name.required' => 'Digite o serviço',
            'name.string'   => 'Informe um serviço válido',
            'price.required' => 'Informe o valor do serviço'
        ];
    }
}
