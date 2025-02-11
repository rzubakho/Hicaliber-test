<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\ListRequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class PropertyDataRequest extends FormRequest
{
    use ListRequestTrait;

    protected function getPerPageOptions(): array
    {
        return [10, 50];
    }

    protected function getSortableFields(): array
    {
        return ['name', 'price', 'created_at'];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge(
            $this->paginationRules(),
            $this->sortingRules(),
            [
                'min_price' => 'sometimes|nullable|numeric|min:0',
                'max_price' => 'sometimes|nullable|numeric|min:0|gte:min_price',
            ]
        );
    }
}
