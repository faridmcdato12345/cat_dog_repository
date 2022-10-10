<?php

namespace App\Http\Services;

use Illuminate\Pagination\LengthAwarePaginator;

class LengthAwarePaginatorService extends LengthAwarePaginator
{
    /**
     * A class that change the default behavior of toArray function
     * from LengthAwarePaginator class
     */
    public function toArray()
    {
        return [
            'page' => $this->currentPage(),
            'limit' => $this->perPage(),
            'results' => $this->items->toArray()
        ];
    }
}