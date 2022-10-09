<?php

namespace App\Http\ControllerExtends;

use App\Http\Controllers\Controller;
use App\Http\Services\ManipulateResponseService;
use App\Http\Traits\CatsTrait;
use App\Http\Traits\DogsTrait;

class AnimalController extends Controller {

    use CatsTrait;
    use DogsTrait;

    public function combineData()
    {   
        $dogData = (new ManipulateResponseService)->mutateResponse($this->dogsData());
        $catData = (new ManipulateResponseService)->mutateResponse($this->catsData());
        return array_merge($catData,$dogData);
    }

    public function combineDateImageOnly()
    {
        $dogData = (new ManipulateResponseService)->mutateBreedImageResponse($this->dogsData());
        $catData = (new ManipulateResponseService)->mutateBreedImageResponse($this->catsData());
        return array_merge($catData,$dogData);
    }
}