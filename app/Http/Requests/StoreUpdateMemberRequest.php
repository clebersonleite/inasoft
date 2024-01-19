<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateMemberRequest extends FormRequest
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
            'nome' => 'nullable|min:3|max:255',
            'email' => [
                'nullable',
                'email',
                'max:255',
                // 'unique:guests,email,telefone' . $guestId,
            ],
            'telefone' => 'nullable|min:14|max:16',
            'data_de_nascimento' => 'nullable|min:10',
            'logradouro' => 'nullable|min:10',
            'numero' => 'nullable|min:3',
            'bairro' => 'nullable|min:3',
            'cidade' => 'nullable|min:3',
            'estado' => 'nullable|min:2',
            'referencia' => 'nullable|min:3',
            'cep' => 'nullable|min:9',
            'estado_civil' => 'nullable|min:3',
            'genero' => 'nullable|min:3',
            'batizado' => 'nullable',
            'fkCodDepartment' => 'nullable|min:1',
            'fkCodCell' => 'nullable|min:1',
            'fkCodChurch' => 'min:1'
        ];
    }
}
