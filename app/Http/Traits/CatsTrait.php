<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Http;

trait CatsTrait
{
    /**
     * catsData function will collect the data from the cats api
     */
    public function catsData()
    {
        $response = Http::withHeaders([
            'x-api-key' => 'live_eTEdZ836ODBMxCK6n7xEvDgFsTMVxA1MRtYzjcFjRe2WHRIR7BlaLYxBonV68MMN'
        ])
        ->get('https://api.thecatapi.com/v1/images/search?limit=100');
        return json_decode($response);
    }
    public function catsBreed($breed){
        $breedId = substr($breed,0,-2);
        $response = Http::withHeaders([
            'x-api-key' => 'live_ma0cFDKjqG3mZmcXlim6hKvgy8IkwsbLvM0AwRn6XJ0yWUb47KKaYHgGBS4UEmMG'
        ])
        ->get('https://api.thecatapi.com/v1/images/search?breed_ids='.$breedId);
        return json_decode($response);
    }
    public function catsId($id){
        $response = Http::withHeaders([
            'x-api-key' => 'live_ma0cFDKjqG3mZmcXlim6hKvgy8IkwsbLvM0AwRn6XJ0yWUb47KKaYHgGBS4UEmMG'
        ])
        ->get('https://api.thecatapi.com/v1/images/search?breed_ids='.$id);
        return json_decode($response);
    }
}