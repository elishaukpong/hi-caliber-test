<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Filters\PropertyFilter;
use App\Http\Resources\API\V1\PropertyResource;
use App\Models\Property;

class SearchPropertyController extends Controller
{
    public function __invoke(PropertyFilter $filter)
    {
        return PropertyResource::collection(Property::filter($filter)->paginate());
    }
}
