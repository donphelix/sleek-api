<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Http\Resources\PropertyResource;
use App\Models\Property;
use App\PropertyRepositoryInterface;
use Illuminate\Http\Response;

class PropertyController extends Controller
{
    protected PropertyRepositoryInterface $propertyRepository;

    public function __construct(PropertyRepositoryInterface $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }

    public function index()
    {
        $properties = $this->propertyRepository->all();
        return PropertyResource::collection($properties);
    }

    public function store(PropertyRequest $request)
    {
        $property = $this->propertyRepository->create($request->validated());
        return new PropertyResource($property);
    }

    public function update(PropertyRequest $request, Property $property)
    {
        $property = $this->propertyRepository->update($property, $request->validated());
        return new PropertyResource($property);
    }

    public function destroy(Property $property)
    {
        $this->propertyRepository->delete($property);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

