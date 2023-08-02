<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientForDoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'medico_id' => 'integer|required',
            'paciente_id' => 'integer|required'
        ];
    }

    public function messages(){
        
        return [
            'medico_id.required' => 'O campo medico_id é obrigatório.',
            'paciente_id.required' => 'O campo paciente_id é obrigatório.',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Validation\ValidationException(
            $validator,
            response()->json(['errors' => $validator->errors()], 422)
        );
    }
}
