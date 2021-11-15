<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Diary;

class StoreDiaryRequest extends FormRequest
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
    public function rules()  {
        return [
            'client_id' => [
                'numeric',
                'required',
                'exists:clients,id'
            ],
            'service_id' => [
                'numeric',
                'required',
                'exists:services,id'
            ],
            'date' => [
                'date',
                'required'
            ],
            'hour' => [
                'string',
                'required',
                // function ($attribute, $value, $fail) {
                //     if (Diary::where([ 'service_id' => request()->service_id, 'date' => request()->date, 'hour' => $value ])->count()) {
                //         $fail('Atenção! Horario indisponivel' );
                //     }
                // }
            ],
            'observations' => [
                'nullable',
                'string'
            ],
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
            'service.required' => 'Digite o Serviço'
        ];
    }
}
