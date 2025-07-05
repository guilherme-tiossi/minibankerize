<?php

namespace App\Services;

use App\Entities\ProposalEntity;
use App\Services\AuthorizationService;
use App\Repositories\ProposalRepository;

class ProposalService
{
    private AuthorizationService $authorizationService;
    private ProposalRepository $proposalRepository;

    public function __construct(AuthorizationService $authorizationService, ProposalRepository $proposalRepository)
    {
        $this->authorizationService = $authorizationService;
        $this->proposalRepository = $proposalRepository;
    }

    public function registerProposal(ProposalEntity $proposalEntity)
    {
        $proposalEntity = $this->proposalRepository->saveProposal($proposalEntity);
        $proposalEntity->status = $this->authorizationService->getAuthorization();

        $proposalEntity = $this->proposalRepository->updateProposal($proposalEntity, ['status' => $proposalEntity->status]);

        return $proposalEntity;
    }
}
