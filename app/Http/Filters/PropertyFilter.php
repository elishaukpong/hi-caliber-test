<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PropertyFilter extends BaseQueryFilter
{
    public function name($value): Builder
    {
        return $this->builder->where('name', 'LIKE', $value . '%');
    }

    public function bedrooms($value): Builder
    {
        return $this->builder->where('bedroom_count', $value);
    }

    public function bathrooms($value): Builder
    {
        return $this->builder->where('bathroom_count', $value);
    }

    public function storeys($value): Builder
    {
        return $this->builder->where('storey_count', $value);
    }

    public function garages($value): Builder
    {
        return $this->builder->where('garage_count', $value);
    }

    public function price($value): Builder
    {
        $createdAt = explode(',', $value);

        if (count($createdAt) > 1) {
            return $this->builder->whereBetween('price', $createdAt);
        }

        return $this->builder->whereDate('price', $createdAt);
    }
}