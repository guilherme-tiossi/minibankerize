<?php

namespace App\Services;

use App\Adapters\RequestAdapter;

class AuthorizationService
{
    private RequestAdapter $requestAdapter;

    public function __construct(RequestAdapter $requestAdapter)
    {
        $this->requestAdapter = $requestAdapter;
    }

    public function getAuthorization()
    {
        $successfulAuthorization = $this->requestClient->try(getenv('AUTHORIZE_URL'));

        $status = $successfulAuthorization ? 'approved' : 'denied'; 
     
        return $status;
    }

}