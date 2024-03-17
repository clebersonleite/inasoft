<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $memberId = $this->route('id');
        return [
            'nome' => 'nullable|min:3',
            'email' => [
                'nullable',
                'email',
                'max:255',
                // Rule::unique('members')->ignore($memberId)->where(function ($query) {
                //     return $query->where('email', $this->email);
                // }),
            ],
            'telefone' => [
                'nullable',
                // Rule::unique('members')->ignore($memberId)->where(function ($query) {
                //     return $query->where('nome', $this->nome)
                //         ->where('telefone', $this->telefone)
                //         ->where('data_de_nascimento', $this->data_de_nascimento);
                // }),
            ],
            'data_de_nascimento' => 'nullable',
            'logradouro' => 'nullable',
            'numero' => 'nullable',
            'bairro' => 'nullable',
            'cidade' => 'nullable',
            'estado' => 'nullable',
            'referencia' => 'nullable',
            'cep' => 'nullable',
            'estado_civil' => 'nullable',
            'genero' => 'nullable',
            'batizado' => 'nullable',
            'fkCodDepartment' => 'nullable',
            'fkCodCell' => 'nullable',
            'fkCodChurch' => 'min:1'
        ];
    }
}
