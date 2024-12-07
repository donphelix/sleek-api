<?php

namespace App\Repository;

use App\Models\Property;
use App\PropertyRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PropertyRepository implements PropertyRepositoryInterface
{
    public function all(int $perPage = 15)
    {
        return Property::paginate($perPage);
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
