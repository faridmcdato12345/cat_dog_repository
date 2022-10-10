<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Traits\PaginatorTrait;
use Illuminate\Support\Facades\URL;
use App\Http\ControllerExtends\AnimalController as Controller;
use App\Http\Requests\PageLimitRequest;
use App\Http\Services\CheckBreedService;
use App\Http\Traits\CatsTrait;
use Facade\FlareClient\Http\Response;

class AnimalController extends Controller
{
    use PaginatorTrait;
    public function index(Request $request)
    {  
        if(!$request->query('page') || !$request->query('limit'))
        {
            return response()->json(['message' => 'page and limit is required.']);
        }
        $page = $request->query('page');
        $limit = $request->query('limit');
        return $this->paginate(collect($this->combineData()),$limit,$page);
    }
    public function showBreedImageOnly(Request $request,$breed){
        if(!$request->query('page') || !$request->query('limit'))
        {
            return response()->json(['message' => 'page and limit is required.']);
        }
        $page = $request->query('page');
        $limit = $request->query('limit');
        try {
            if((new CheckBreedService)->catsBreed($breed) && (new CheckBreedService)->dogsBreed($breed))
            {
                return $this->paginate(collect($this->catsDogsWithBreedDataImageOnly(false,$breed)),$limit,$page);
            }
            elseif((new CheckBreedService)->catsBreed($breed) && !(new CheckBreedService)->dogsBreed($breed))
            {
                return $this->paginate(collect($this->catsDataImageOnly($breed)),$limit,$page);
            }
            elseif(!(new CheckBreedService)->catsBreed($breed) && !(new CheckBreedService)->dogsBreed($breed))
            {
                return $this->paginate(collect($this->dogsDataImageOnly($breed)),$limit,$page);
            }
            else{
                return response()->json(['message' => 'No breed found.'],200);
            }            
        } catch (\Throwable $e) {
            return response()->json($e);
        }        
    }
    public function showList(Request $request)
    {
        if(!$request->query('page') || !$request->query('limit'))
        {
            return response()->json(['message' => 'page and limit is required.']);
        }
        $page = $request->query('page');
        $limit = $request->query('limit');
        return $this->paginate(collect($this->catsDogsWithOutBreedDataImageOnly()),$limit,$page);
    }
}
