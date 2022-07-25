<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'description' => 'required|string',
            'price' => 'required|numeric',
            'name' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.string' => 'O nome deve ser uma string',
            'name.max' => 'O nome deve no máximo 255 caracteres',
            'description.required' => 'A descrição é obrigatória',
            'description.string' => 'A descrição deve ser uma string',
            'price.required' => 'O preço é obrigatório',
            'price.required' => 'O preço deve ser um valor numérico',
        ];
    }
}
