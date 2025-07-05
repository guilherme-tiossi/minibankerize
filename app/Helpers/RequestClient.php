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

    public function try($url, $method)
    {
        $successful = false;
        $tries = 0;

        while ($successful !== true && $tries < 50) {
            $result = $this->requestAdapter->makeRequest($url, $method);

            if ($result['successful']) {
                $successful = true;
            }

            $tries++;
        }

        return $successful;
    }
}
