<?php

namespace App\Adapters;

use App\Models\Proposal;
use App\Entities\ProposalEntity;

class ProposalAdapter
{
    public function create(ProposalEntity $proposalEntity)
    {
        $proposal = Proposal::create([
            'cpf' => $proposalEntity->cpf,
            'nome' => $proposalEntity->nome,
            'data_nascimento' => $proposalEntity->data_nascimento,
            'valor_emprestimo' => $proposalEntity->valor_emprestimo,
            'chave_pix' => $proposalEntity->chave_pix,
        ]);

        $proposalEntity->id = $proposal->id;

        return $proposalEntity;
    }

    public function update(ProposalEntity $proposalEntity, array $data) {
        $proposal = Proposal::where('id', $proposalEntity->id)->update($data);

        $proposalEntity->status = $proposal->status;
        $proposalEntity->notificado = $proposal->notificado;

        return $proposalEntity;
    }
}