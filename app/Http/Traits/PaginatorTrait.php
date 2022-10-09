<?php

namespace App\Http\Traits;

use App\Http\Services\LengthAwarePaginatorService;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;

trait PaginatorTrait
{

    public function paginate($items, $perPage, $page, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginatorService($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}