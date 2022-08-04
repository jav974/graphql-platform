<?php

namespace App\Resolver\Product;

use ApiPlatform\GraphQl\Resolver\QueryCollectionResolverInterface;
use ApiPlatform\State\Pagination\ArrayPaginator;
use App\Api\Context\Context;

class ProductsResolver implements QueryCollectionResolverInterface
{
    public function __invoke(iterable $collection, array $context): iterable
    {
        $filters = Context::catalogFilters($context);

        // TODO: process the necessary things...

        return new ArrayPaginator([], 0, 0);
    }
}
