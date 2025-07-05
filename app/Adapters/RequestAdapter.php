<?php

namespace App\Adapters;

use Illuminate\Support\Facades\Http;

class RequestAdapter
{
    public function makeRequest($url, $method)
    {

        switch ($method) {
            case 'get':
                $result = Http::get($url);
                break;
            case 'post':
                $result = Http::post($url);
                break;
            default:
                $result = Http::get($url);
        }

        return [
            'successful' => $result->successful(),
            'json' => $result->json()
        ];
    }
}
