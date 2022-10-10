<?php

namespace App\Http\Services;

use App\Http\Traits\CatsTrait;
use App\Http\Traits\DogsTrait;

class CheckBreedService {

    use CatsTrait;
    use DogsTrait;

    public function checkCatBreed($breed)
    {
        $catResponse = $this->catsBreed($breed);
        if(empty($catResponse))
        {
            return false;
        }
        return true;
    }

    public function checkDogBreed($breed)
    {
        $dogResponse = $this->dogsBreed($breed);
        if(empty($dogResponse))
        {
            return false;
        }
        return true;
    }
}