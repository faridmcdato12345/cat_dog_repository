<?php

namespace App\Http\Services;

use App\Http\Traits\CatsTrait;
use App\Http\Traits\DogsTrait;

class CheckIdService {

    use CatsTrait;
    use DogsTrait;

    public function checkCatBreed($id)
    {
        $catResponse = $this->catsBreed($id);
        if(empty($catResponse))
        {
            return false;
        }
        return true;
    }

    public function checkDogBreed($id)
    {
        $dogResponse = $this->dogsBreed($id);
        if(empty($dogResponse))
        {
            return false;
        }
        return true;
    }
}