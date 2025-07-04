<?php

namespace App\Observers;

use App\Models\Proposal;
use App\Services\NotificationService;
use App\Repositories\ProposalRepository;

class ProposalObserver
{
    private ProposalRepository $proposalRepository;

    public function __construct(ProposalRepository $proposalRepository)
    {
        $this->proposalRepository = $proposalRepository;
    }

    public function created(Proposal $proposal)
    {
        //
    }

    public function updated(Proposal $proposal)
    {
        if ($proposal->status == 'approved') {
            $successfulNotification = NotificationService::sendNotification();
            if ($successfulNotification) {
                $proposal->update(['notificado' => true]);

                $proposalEntity = new ProposalEntity([
                    $proposal->cpf,
                    $proposal->nome,
                    $proposal->data_nascimento,
                    $proposal->valor_emprestimo,
                    $proposal->chave_pix,
                    $proposal->id
                ]);

                $proposalEntity = $this->proposalRepository->updateProposal($proposalEntity, ['notificado' => true]);
            }
        }
    }

    public function deleted(Proposal $proposal)
    {
        //
    }

    public function restored(Proposal $proposal)
    {
        //
    }

    public function forceDeleted(Proposal $proposal)
    {
        //
    }
}
