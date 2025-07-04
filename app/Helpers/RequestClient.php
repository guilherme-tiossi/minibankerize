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

        while ($successful !== true && $tries < 50) {
            switch ($method) {
                case 'get':
                    $result = $this->requestAdapter->get($url);
                    break;
                case 'post':
                    $result = $this->requestAdapter->post($url);
                    break;
                default:
                    $result = $this->requestAdapter->get($url);
                    break;
            }

            if ($result['successful']) $successful = true;

            $tries++;
        }

        return $successful;
    }

}