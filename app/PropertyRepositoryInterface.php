<?php

namespace App;

use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;

interface PropertyRepositoryInterface
{
    public function all();

    public function create(array $data): Property;

    public function update(Property $property, array $data): Property;

    public function delete(Property $property): bool;
}
