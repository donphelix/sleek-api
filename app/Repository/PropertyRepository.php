<?php

namespace App\Repository;

use App\Models\Property;
use App\PropertyRepositoryInterface;

class PropertyRepository implements PropertyRepositoryInterface
{
    public function all(): array
    {
        return Property::all()->toArray();
    }

    public function create(array $data): Property
    {
        return Property::create($data);
    }

    public function update(Property $property, array $data): Property
    {
        $property->update($data);
        return $property;
    }

    public function delete(Property $property): bool
    {
        return $property->delete();
    }
}
