<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReviewRequest extends FormRequest
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
            'id_game' => 'required|integer',
            'title'  => 'required|string|max:255',
            'score'  => 'required|integer|min:1|max:10', // Nota de 1 a 10
            'text'   => 'required|string|min:10', 
        ];
    }

    public function messages(): array
    {
        return [
            'score.max' => 'A nota máxima permitida é 10.',
            'text.min'  => 'Sua review precisa ter pelo menos 10 caracteres.',
            'required'  => 'O campo :attribute é obrigatório.',
        ];
    }
}
