<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserRequest extends FormRequest
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

        $userId = $this->route('user');

        return [
            'name' => 'nullable|min:3|max:255',
            'email' => [
                'nullable',
                'email',
                'max:255',
                'unique:users,email,' . $userId,
            ],
            'password' => [
                'nullable',
                'min:6',
                'max:100'
            ],
            'cargo' => 'nullable',
            'fkCodChurch' => 'required'
        ];
    }
}
