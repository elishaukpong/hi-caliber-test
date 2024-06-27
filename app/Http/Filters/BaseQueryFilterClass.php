<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class BaseQueryFilterClass
{
    protected Builder $builder;

    public function __construct(protected Request $request)
    {
        //
    }

    public function filter(array $array): void
    {
        $this->iterateAndCallMethod($array);
    }

    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        $this->iterateAndCallMethod($this->request->all());

        return $builder;
    }

    public function iterateAndCallMethod(array $array): void
    {
        foreach ($array as $key => $value) {
            if (method_exists($this, $key)) {
                $this->$key($value);
            }
        }
    }
}