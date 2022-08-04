<?php

namespace App\Resolver\Product;

use ApiPlatform\GraphQl\Resolver\QueryItemResolverInterface;

class ProductResolver implements QueryItemResolverInterface
{
    public function __invoke($item, array $context)
    {
        // TODO: process the necessary things...

        return null;
    }
}
