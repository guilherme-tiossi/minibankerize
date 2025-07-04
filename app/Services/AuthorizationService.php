<?php

namespace App\Services;

use App\Helpers\RequestClient;

class AuthorizationService
{
    private RequestClient $requestClient;

    public function __construct(RequestClient $requestClient)
    {
        $this->requestClient = $requestClient;
    }

    public function getAuthorization()
    {
        $successfulAuthorization = $this->requestClient->try(getenv('AUTHORIZE_URL'), 'get');

        $status = $successfulAuthorization ? 'approved' : 'denied'; 
     
        return $status;
    }

}