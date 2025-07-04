<?php

namespace App\Models;

use App\Observers\ProposalObserver;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
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
