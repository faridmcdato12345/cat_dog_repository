<?php

namespace App\Http\Traits;
use Illuminate\Support\Facades\Http;

trait DogsTrait{
    
    /** 
     * dogsData function will collect the data from the dog api
    */

    public function dogsData()
    {
        $response = Http::withHeaders([
            'x-api-key' => 'live_C9jTfoWJKbCyOXb3ttngNQ4m32b5PYkboCDjo6FwkuvUVN5pm4k1MfwnVm0rg7eJ'
        ])
        ->get('https://api.thedogapi.com/v1/images/search?limit=100');
        return json_decode($response);
    }

    public function dogsBreed($breed){
        $breedId = substr($breed,0,-2);
        $response = Http::withHeaders([
            'x-api-key' => 'live_C9jTfoWJKbCyOXb3ttngNQ4m32b5PYkboCDjo6FwkuvUVN5pm4k1MfwnVm0rg7eJ'
        ])
        ->get('https://api.thedogapi.com/v1/images/search?breed_ids='.$breedId);
        return json_decode($response);
    }
}