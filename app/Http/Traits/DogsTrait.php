<?php

namespace App\Http\Traits;
use Illuminate\Support\Facades\Http;

trait DogsTrait{

    public function dogsData()
    {
        $response = Http::withHeaders([
            'x-api-key' => 'live_uqpKbDiPc9d7prvZT055EDZu2pYehpOLzT0ZgarW8cWYA6cv6ZHUrluCvSSyRKSU'
        ])
        ->get('https://api.thedogapi.com/v1/images/search?limit=100');
        return json_decode($response);
    }
}