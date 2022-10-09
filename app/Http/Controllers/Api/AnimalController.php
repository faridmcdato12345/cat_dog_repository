<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Traits\PaginatorTrait;
use Illuminate\Support\Facades\URL;
use App\Http\ControllerExtends\AnimalController as Controller;

class AnimalController extends Controller
{
    use PaginatorTrait;

    public function index(Request $request)
    {  
        $page = $request->query('page');
        $limit = $request->query('limit');
        return $this->paginate(collect($this->combineData()),$limit,$page);
    }
    public function showBreedImageOnly(Request $request){
        $page = $request->query('page');
        $limit = $request->query('limit');
        return $this->paginate(collect($this->combineDateImageOnly()),$limit,$page);
    }
}
