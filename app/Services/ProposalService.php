<?php

namespace App\Services;

use App\Services\AuthorizationService;
use App\Repositories\ProposalRepository;

class ProposalService
{
    private AuthorizationService $authorizationService;

    public function __construct(AuthorizationService $authorizationService)
    {
        $this->authorizationService = $authorizationService;
        $this->proposalRepository = $proposalRepository;
    }

    public function registerProposal($proposalEntity)
    {
        $proposalEntity = $this->proposalRepository->saveProposal($proposalEntity);
        $proposalEntity->status = $this->authorizationService->getAuthorization();
        
        $proposalEntity = $this->proposalRepository->updateProposal($proposalEntity, ['status' => $proposalEntity->status]);

        return $proposalEntity;
    }

}