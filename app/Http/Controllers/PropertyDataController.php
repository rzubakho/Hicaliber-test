<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyDataRequest;
use App\Models\PropertyData;


class PropertyDataController extends Controller
{
    public function index(PropertyDataRequest $request)
    {
        $perPage = $request->input('per_page', PropertyData::SORT_DEFAULT['per_page']);
        $propertyData = PropertyData::filter($request->all());
        return $propertyData->paginate($perPage);
    }
}
