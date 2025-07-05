<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'cpf',
        'nome',
        'data_nascimento',
        'valor_emprestimo',
        'chave_pix',
        'status',
        'notificado'
    ];
}
