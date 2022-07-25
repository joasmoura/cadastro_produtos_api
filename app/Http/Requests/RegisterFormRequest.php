<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|string|min:6|confirmed',
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required|string|max:255',
        ];
    }

    public function messages () {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.string' => 'O nome deve ser uma string',
            'name.max' => 'O nome deve no máximo 255 caracteres',
            'email.required' => 'O email é obrigatório',
            'email.string' => 'O email deve ser uma string',
            'email.email' => 'O email deve ser um email válido',
            'email.max' => 'O email deve no máximo 255 caracteres',
            'email.unique' => 'Uma conta com o email informado já está cadastrada',
            'password.required' => 'A senha é obrigatória',
            'password.string' => 'A senha deve ser uma string',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres',
            'password.confirmed' => 'A senha deve ser confirmada',
        ];
    }
}
