<?php

namespace App\Entities;

class ProposalEntity
{
    public $id;
    public string $cpf;
    public string $nome;
    public string $data_nascimento;
    public float $valor_emprestimo;
    public string $chave_pix;
    public string $status;
    public bool $notificado;

    public function __construct(string $cpf, string $nome, string $data_nascimento, float $valor_emprestimo, string $chave_pix, $id = null)
    {
        $this->id = $id;
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->data_nascimento = $data_nascimento;
        $this->valor_emprestimo = $valor_emprestimo;
        $this->chave_pix = $chave_pix;
    }
}
