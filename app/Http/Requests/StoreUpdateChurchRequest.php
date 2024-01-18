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
                'max:255',
                'unique:churches,email,whatsapp' . $churchId,
            ],
            'whatsapp' => 'required|unique:churches|min:14|max:16',
            'pastor_presidente' => 'required|min:3',
            'logo' => 'nullable|min:3',
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
