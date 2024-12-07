<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Http\Resources\PropertyResource;
use App\Models\Property;
use App\PropertyRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    protected PropertyRepositoryInterface $propertyRepository;

    public function __construct(PropertyRepositoryInterface $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $perPage = $request->get('per_page', 15); // Default to 15 items per page
        $properties = $this->propertyRepository->all($perPage);

        return PropertyResource::collection($properties)
            ->additional([
                'meta' => [
                    'current_page' => $properties->currentPage(),
                    'last_page' => $properties->lastPage(),
                    'per_page' => $properties->perPage(),
                    'total' => $properties->total(),
                ],
            ]);
    }

    public function store(PropertyRequest $request): PropertyResource
    {
        $property = $this->propertyRepository->create($request->validated());
        return new PropertyResource($property);
    }

    public function update(PropertyRequest $request, Property $property): PropertyResource
    {
        $property = $this->propertyRepository->update($property, $request->validated());
        return new PropertyResource($property);
    }

    public function destroy(Property $property): \Illuminate\Http\JsonResponse
    {
        $this->propertyRepository->delete($property);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

