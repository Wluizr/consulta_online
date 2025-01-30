<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteRequest extends FormRequest
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
        $rules = [
            'nome' => 'required|string',
            'celular' => 'required|max:20',
        ];


        if($this->isMethod('post')){
            $rules['cpf'] = 'required';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => 'O campo :attribute, é obrigatório',
            'string' => 'O campo :attribute, precisa ser uma string;',
        ];
    }
}
