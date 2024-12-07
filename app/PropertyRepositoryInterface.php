<?php

namespace App;

use App\Models\Property;

interface PropertyRepositoryInterface
{
    public function all(): array;

    public function create(array $data): Property;

    public function update(Property $property, array $data): Property;

    public function delete(Property $property): bool;
}
