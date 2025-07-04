<?php

namespace App\Helpers;

use App\Adapters\RequestAdapter;
use Illuminate\Support\Facades\Http;

class RequestClient
{
    private RequestAdapter $requestAdapter;

    public function __construct(RequestAdapter $requestAdapter)
    {
        $this->requestAdapter = $requestAdapter;
    }
    
    public function try($url)
    {
        $successful = false;

        while ($successful !== true && $tries < 100) {
            $result = $this->requestAdapter->post($url);

            if ($result['successful']) $successful = true;

            $tries++;
        }

        return $successful;
    }

}