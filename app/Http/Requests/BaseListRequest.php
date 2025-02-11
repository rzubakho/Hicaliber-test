<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseListRequest extends FormRequest
{
    protected array $sortableFields = ['id'];
    protected array $perPageOptions = [10, 50, 100];

    protected function paginationRules(): array
    {
        return [
            'page'     => 'integer|min:1',
            'per_page' => 'integer|in:' . implode(',', $this->perPageOptions),
        ];
    }

    protected function sortingRules(): array
    {
        return [
            'sort_by'  => 'string|in:' . implode(',', $this->sortableFields),
            'order_by' => 'string|in:asc,desc',
        ];
    }
}
