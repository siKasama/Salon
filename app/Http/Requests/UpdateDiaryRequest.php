<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDiaryRequest extends FormRequest
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
            'date' => [
                'date',
                'required'
            ],
            'hour' => [
                'string',
                'required'
            ]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array   {
        return [
            'date.date' => 'Digite uma data válida',
            'date.required' => 'Informe a data do agendamento'
        ];
    }
}
