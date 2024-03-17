<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCellRequest extends FormRequest
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
            'nome' => 'required|min:3|max:255',
            'tipo' => 'required|min:3',
            'anfitriao' => 'required|min:3',
            'data_de_abertura' => 'nullable',
            'logradouro' => 'nullable',
            'numero' => 'nullable',
            'bairro' => 'nullable',
            'cidade' => 'nullable',
            'estado' => 'nullable|min:2',
            'referencia' => 'nullable',
            'cep' => 'nullable|min:9',
            'fkCodChurch' => 'required|min:1',
            'fkCodLider' => 'nullable|min:1',
            'fkCodLider2' => 'nullable|min:1'
        ];
    }
}
