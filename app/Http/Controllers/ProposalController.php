<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProposalRequest;
use App\Services\ProposalService;
use App\Entities\ProposalEntity;

class ProposalController extends Controller
{
    private ProposalService $proposalService;

    public function __construct(ProposalService $proposalService)
    {
        $this->proposalService = $proposalService;
    }

    public function proposal(ProposalRequest $request)
    {
        $proposalEntity = new ProposalEntity([
            $request->validated()->cpf,
            $request->validated()->nome,
            $request->validated()->data_nascimento,
            $request->validated()->valor_emprestimo,
            $request->validated()->chave_pix
        ]);

        $proposalEntity = $this->$proposalService->registerProposal($proposalEntity);

        return response([
            'cpf' => $proposalEntity->cpf,
            'nome' => $proposalEntity->nome,
            'data_nascimento' => $proposalEntity->data_nascimento,
            'valor_emprestimo' => $proposalEntity->valor_emprestimo,
            'chave_pix' => $proposalEntity->chave_pix,
            'status' => $proposalEntity->status,
            'notificado' => $proposalEntity->notificado
        ], 200);
    }
}