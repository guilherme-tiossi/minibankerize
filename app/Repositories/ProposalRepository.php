<?php

namespace App\Repositories;

use App\Adapters\ProposalAdapter;
use App\Entities\ProposalEntity;

class ProposalRepository
{
    private ProposalAdapter $proposalAdapter;

    public function __construct(ProposalAdapter $proposalAdapter)
    {
        $this->proposalAdapter = $proposalAdapter;
    }

    public function saveProposal(ProposalEntity $proposalEntity)
    {
        $proposalEntity = $this->proposalAdapter->create($proposalEntity);

        return $proposalEntity;
    }

    public function updateProposal(ProposalEntity $proposalEntity, string $status) {
        $proposalEntity = $this->proposalAdapter->updateStatus($proposalEntity, $status);

        return $proposalEntity;
    }

}