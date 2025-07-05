<?php

namespace App\Services;

use App\Helpers\RequestClient;

class NotificationService
{
    private RequestClient $requestClient;

    public function __construct(RequestClient $requestClient)
    {
        $this->requestClient = $requestClient;
    }

    public function sendNotification()
    {
        return $this->requestClient->try(getenv('NOTIFY_URL'), 'post');
    }
}
