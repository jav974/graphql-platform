<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GraphQl\QueryCollection;
use App\Resolver\Offer\OffersResolver;

#[ApiResource(
    operations: [new Get()],
    graphQlOperations: [
        new QueryCollection(
            resolver: OffersResolver::class,
            args: [
                'filters' => ['type' => 'Filters'],
                'search' => ['type' => 'String'],
                'sort' => ['type' => 'String', 'description' => 'The sort order, one of: [alpha_up, alpha_down, price_up, price_down, kg_price_up, kg_price_down, best_sales]'],
                'first' => ['type' => 'Int', 'description' => "Returns the first n elements from the list."],
                'last' => ['type' => 'Int', 'description' => "Returns the last n elements from the list."],
                'before' => ['type' => 'String', 'description' => "Returns the elements in the list that come before the specified cursor."],
                'after' => ['type' => 'String', 'description' => "Returns the elements in the list that come after the specified cursor."],
            ],
            read: false
        )
    ]
)]
class Offer
{
    public int $id;
    public string $name;
    public string $unit;
    public ?string $content;
    public float $priceWithVat;
    public ?Supplier $supplier;
}
