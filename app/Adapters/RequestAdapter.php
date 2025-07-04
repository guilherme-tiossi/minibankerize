<?php

namespace App\Adapters;

use Illuminate\Support\Facades\Http;

class RequestAdapter
{
    public function get($url)
    {
        $result = Http::get($url);
        
        return [
            'status' => $result->successful(),
            'json' => $result->json()
        ];
    }

}