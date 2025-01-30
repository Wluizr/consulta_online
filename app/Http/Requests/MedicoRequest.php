<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string',
            'especialidade' => 'required|string',
            'cidade_id' => 'required|int',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'O campo :attribute, é obrigatório.',
            'string' => 'O campo :attribute, deve ser uma string.',
            'integer' => 'O campo :attribute, deve ser um número inteiro.',
        ];
    }
}
