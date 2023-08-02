<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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
            'nome' => 'string|required',
            'especialidade' => 'string|required',
            'cidade_id' => 'integer|required'
        ];
    }

    public function messages(){
        
        return [
            'nome.required' => 'O campo name é obrigatório.',
            'especialidade.required' => 'O campo especialidade é obrigatório.',
            'cidade_id.required' => 'O id da cidade é obrigatório.',
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
