<?php

namespace App\ModelFilters;

use App\Models\PropertyData;
use EloquentFilter\ModelFilter;

class PropertyDataFilter extends ModelFilter
{
    public function setup()
    {
        $this->push('order_by', $this->input('order_by', PropertyData::SORT_DEFAULT['order_by']));
        $this->push('sort_by', $this->input('sort_by', PropertyData::SORT_DEFAULT['sort_by']));
    }

    public function sortBy(string $sortBy): self
    {
        return $this->orderBy($this->input('sort_by'), $this->input('order_by'));
    }

    public function name(?string $name): void
    {
        $this->where('name', 'like', "%$name%");
    }

    public function priceMin(int $price): void
    {
        $this->where('price', '>=', $price);
    }

    public function priceMax(int $price): void
    {
        $this->where('price', '<=', $price);
    }

    public function bedrooms(int $value): void
    {
        $this->where('bedrooms', $value);
    }

    public function bathrooms(int $value): void
    {
        $this->where('bathrooms', $value);
    }

    public function storeys(int $value): void
    {
        $this->where('storeys', $value);
    }

    public function garages(int $value): void
    {
        $this->where('garages', $value);
    }
}
