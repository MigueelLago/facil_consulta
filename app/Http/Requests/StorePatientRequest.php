<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
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
            'cpf' => 'required|formato_cpf',
            'celular' => 'required|string|max:20|celular_com_ddd'
        ];
    }

    public function messages(){
        
        return [
            'nome.required' => 'O campo name é obrigatório.',
            'cpf.required' => 'O campo cpf é obrigatório.',
            'celular.required' => 'O campo celular é obrigatório.',
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
