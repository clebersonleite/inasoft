<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateGuestRequest extends FormRequest
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
        // $guestId = $this->route('guest');

        return [
            'nome' => 'nullable|min:3|max:255',
            'email' => [
                'nullable',
                'email',
                'max:255',
                // 'unique:guests,email,telefone' . $guestId,
            ],
            'telefone' => 'nullable',
            'data_da_visita' => 'nullable',
            'recebeu_jesus' => 'nullable',
            'reconciliacao' => 'nullable',
            'responsavel' => 'nullable',
            'observacoes' => 'nullable',
            'data_de_nascimento' => 'nullable',
            'logradouro' => 'nullable',
            'numero' => 'nullable',
            'bairro' => 'nullable',
            'cidade' => 'nullable',
            'estado' => 'nullable',
            'referencia' => 'nullable',
            'cep' => 'nullable',
            'fkCodChurch' => 'min:1'
        ];
    }
}
