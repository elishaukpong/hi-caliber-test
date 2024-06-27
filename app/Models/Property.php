<?php

namespace App\Models;

use App\Http\Filters\BaseQueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter(Builder $builder, BaseQueryFilter $filter): Builder
    {
        return $filter->apply($builder);
    }
}
