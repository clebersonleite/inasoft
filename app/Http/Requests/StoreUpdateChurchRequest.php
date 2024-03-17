<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateChurchRequest extends FormRequest
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
        $churchId = $this->route('guest');

        return [
            'nome' => 'required|min:3|max:255',
            'email' => [
                'nullable',
                'email',
                'max:255'
            ],
            'whatsapp' => 'required|min:14|max:16',
            'pastor_presidente' => 'required',
            'logo' => 'nullable',
            'logradouro' => 'nullable',
            'numero' => 'nullable',
            'bairro' => 'nullable',
            'cidade' => 'nullable',
            'estado' => 'nullable',
            'referencia' => 'nullable',
            'cep' => 'nullable'
        ];
    }
}
