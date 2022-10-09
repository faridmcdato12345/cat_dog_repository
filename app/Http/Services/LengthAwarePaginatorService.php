<?php

namespace App\Http\Services;

use Illuminate\Pagination\LengthAwarePaginator;

class LengthAwarePaginatorService extends LengthAwarePaginator
{
    public function toArray()
    {
        return [
            'page' => $this->currentPage(),
            'limit' => $this->perPage(),
            'results' => $this->items->toArray()
        ];
    }
}