<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;

#[ApiResource(
    operations: [new Get()],
    graphQlOperations: []
)]
class Supplier
{
    public int $id;
    public string $name;
}
