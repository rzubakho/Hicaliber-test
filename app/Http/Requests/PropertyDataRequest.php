<?php

namespace App\Http\Requests;

use App\Models\PropertyData;
use Illuminate\Contracts\Validation\ValidationRule;

class PropertyDataRequest extends BaseListRequest
{

    protected array $perPageOptions = [10, 50];
    protected array $sortableFields = PropertyData::SORT_FIELDS;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return array_merge(
            $this->paginationRules(),
            $this->sortingRules(),
            [
                'name' => 'sometimes|nullable|string',
                'bedrooms' => 'sometimes|nullable|integer|min:0',
                'bathrooms' => 'sometimes|nullable|integer|min:0',
                'storeys' => 'sometimes|nullable|integer|min:0',
                'garages' => 'sometimes|nullable|integer|min:0',
                'min_price' => 'sometimes|nullable|numeric|min:0',
                'max_price' => 'sometimes|nullable|numeric|min:0|gte:min_price',
            ]
        );
    }
}
