<?php

namespace App\Api;

use ApiPlatform\Metadata\GraphQl\Operation;
use App\Entity\Offer;
use App\Entity\Product;
use App\Entity\Taxon;
use Symfony\Component\PropertyInfo\Type;

class GraphQLExtension
{
    public static function getOperationName(
        ?string $property,
        Type $type,
        string $rootResource,
        ?string $resourceClass,
        bool $input,
        Operation $rootOperation,
        bool $isCollectionType
    ): ?string
    {
        if (($property === 'taxa' && $rootResource === Taxon::class && $resourceClass === Taxon::class)
            || ($property === 'products' && $rootResource === Taxon::class && $resourceClass === Product::class)
            || ($property === 'offers' && $rootResource === Product::class && $resourceClass === Offer::class)
        ) {
            return 'collection_query';
        }

        return null;
    }
}
