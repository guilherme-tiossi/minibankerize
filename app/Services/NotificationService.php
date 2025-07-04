<?php

namespace App\Services;

use App\Adapters\RequestAdapter;
use App\Helpers\RequestClient;
use App\Helpers\ProposalService;

class NotificationService
{
    private RequestAdapter $requestAdapter;
    private ProposalService $proposalService;

    public function __construct(RequestClient $requestClient, NotificationService $proposalService)
    {
        $this->requestClient = $requestClient;
    }

    public static function sendNotification()
    {
        $successful = $this->requestClient->try(getenv('NOTIFY_URL'), 'post');
    }

}