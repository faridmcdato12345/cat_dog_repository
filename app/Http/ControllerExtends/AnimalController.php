<?php

namespace App\Http\ControllerExtends;

use App\Http\Controllers\Controller;
use App\Http\Services\ManipulateResponseService;
use App\Http\Traits\CatsTrait;
use App\Http\Traits\DogsTrait;

class AnimalController extends Controller {

    use CatsTrait;
    use DogsTrait;

    /**
     * combineData function will merge the manipulated data
     */
    public function combineData()
    {   
        $dogData = (new ManipulateResponseService)->mutateResponse($this->dogsData());
        $catData = (new ManipulateResponseService)->mutateResponse($this->catsData());
        return array_merge($catData,$dogData);
    }
    /**
     * catsDataImageOnly function will manipulated cat data to image only data
     */
    public function catsDataImageOnly($breed)
    {
        $catData = (new ManipulateResponseService)
        ->mutateBreedImageResponse($this->catsBreed($breed));
        return $catData;
    }

    /**
     * dogsDataImageOnly function will manipulated dog data to image only data
     */
    public function dogsDataImageOnly($breed)
    {
        $dogData = (new ManipulateResponseService)
        ->mutateBreedImageResponse($this->dogsBreed($breed));
        return $dogData;
    }

    public function catsDogsDataImageOnly($breed){
        $catData = (new ManipulateResponseService)
        ->mutateBreedImageResponse($this->catsBreed($breed));
        $dogData = (new ManipulateResponseService)
        ->mutateBreedImageResponse($this->dogsBreed($breed));
        return array_merge($catData,$dogData);
    }
}