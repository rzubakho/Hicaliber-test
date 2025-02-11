<?php

namespace App\Http\Requests\Traits;

trait ListRequestTrait
{
    protected function getPerPageOptions(): array
    {
        return [10, 50, 100];
    }

    protected function getSortableFields(): array
    {
        return ['id'];
    }

    protected function paginationRules(): array
    {
        return [
            'page'     => 'integer|min:1',
            'per_page' => 'integer|in:' . implode(',', $this->getPerPageOptions()),
        ];
    }

    protected function sortingRules(): array
    {
        return [
            'sort_by'  => 'string|in:' . implode(',', $this->getSortableFields()),
            'order_by' => 'string|in:asc,desc',
        ];
    }
}
