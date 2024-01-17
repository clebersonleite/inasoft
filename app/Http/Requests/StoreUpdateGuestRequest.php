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
        $guestId = $this->route('guest');

        return [
            'nome' => 'required|min:3|max:255',
            'email' => [
                'nullable',
                'email',
                'max:255',
                'unique:guests,email,telefone' . $guestId,
            ],
            'telefone' => 'required|unique:guests|min:14|max:16',
            'data_da_visita' => 'required|min:10',
            'recebeu_jesus' => 'required|min:3',
            'reconciliacao' => 'nullable|min:3',
            'responsavel' => 'nullable|min:3',
            'observacoes' => 'nullable|min:3',
            'data_de_nascimento' => 'nullable|min:10',
            'logradouro' => 'nullable|min:10',
            'numero' => 'nullable|min:3',
            'bairro' => 'nullable|min:3',
            'cidade' => 'nullable|min:3',
            'estado' => 'nullable|min:2',
            'referencia' => 'nullable|min:3',
            'cep' => 'nullable|min:9'
        ];
    }
}
