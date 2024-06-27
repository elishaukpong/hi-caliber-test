<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\PropertyResource;
use App\Models\Property;

class SearchPropertyController extends Controller
{
    public function __invoke()
    {
        return PropertyResource::collection(Property::paginate());
    }
}
