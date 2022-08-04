<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GraphQl\Query;
use ApiPlatform\Metadata\GraphQl\QueryCollection;
use App\Resolver\Taxon\TaxaResolver;
use App\Resolver\Taxon\TaxonResolver;

#[ApiResource(
    operations: [new Get()],
    graphQlOperations: [
        new Query(resolver: TaxonResolver::class, args: ['slug' => ['type' => 'String!'], 'filters' => ['type' => 'Filters']], read: false),
        new QueryCollection(
            resolver: TaxaResolver::class,
            args: [
                'filters' => ['type' => 'Filters'],
                'first' => ['type' => 'Int', 'description' => "Returns the first n elements from the list."],
                'last' => ['type' => 'Int', 'description' => "Returns the last n elements from the list."],
                'before' => ['type' => 'String', 'description' => "Returns the elements in the list that come before the specified cursor."],
                'after' => ['type' => 'String', 'description' => "Returns the elements in the list that come after the specified cursor."],
            ],
            read: false
        )
    ]
)]
class Taxon
{
    public int $id;
    public string $name;
    public int $offersCount;
    public int $productsCount;
    /** @var Taxon[] */
    public iterable $taxa = [];
    /** @var Product[] */
    public iterable $products = [];
}
