<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GraphQl\Query;
use ApiPlatform\Metadata\GraphQl\QueryCollection;
use App\Resolver\Product\ProductResolver;
use App\Resolver\Product\ProductsResolver;

#[ApiResource(
    operations: [new Get()],
    graphQlOperations: [
        new Query(resolver: ProductResolver::class, args: ['slug' => ['type' => 'String!']], read: false),
        new QueryCollection(
            resolver: ProductsResolver::class,
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
class Product
{
    public int $id;
    public string $name;
    public string $slug;
    public float $startingPrice;
    public string $startingPriceUnit;
    public string $currency;
    /** @var Offer[] */
    public iterable $offers = [];
}
