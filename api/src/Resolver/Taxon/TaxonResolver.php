<?php

namespace App\Resolver\Taxon;

use ApiPlatform\GraphQl\Resolver\QueryItemResolverInterface;
use App\Api\Context\Context;

class TaxonResolver implements QueryItemResolverInterface
{
    public function __invoke($item, array $context)
    {
        $filters = Context::catalogFilters($context);

        // TODO: process the necessary things...

        return null;
    }
}
