<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Http;

trait CatsTrait
{

    public function catsData()
    {
        $response = Http::withHeaders([
            'x-api-key' => 'live_eTEdZ836ODBMxCK6n7xEvDgFsTMVxA1MRtYzjcFjRe2WHRIR7BlaLYxBonV68MMN'
        ])
        ->get('https://api.thecatapi.com/v1/images/search?limit=100');
        return json_decode($response);
    }
}