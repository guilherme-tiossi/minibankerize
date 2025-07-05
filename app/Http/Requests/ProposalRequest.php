<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProposalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cpf' => ['required', 'integer', 'unique:proposals,cpf'],
            'nome' => ['required', 'string'],
            'data_nascimento' => ['required', 'date'],
            'valor_emprestimo' => ['required', 'numeric'],
            'chave_pix' => ['required', 'string']
        ];
    }
}
