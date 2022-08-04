<?php


namespace App\Type\Definition;

use ApiPlatform\GraphQl\Type\Definition\TypeInterface;
use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\Type as GraphQLType;

class FiltersType extends InputObjectType implements TypeInterface
{
    public function __construct(array $config = [])
    {
        $config['name'] = 'Filters';
        $config['fields'] = [
            'locales' => ['type' => GraphQLType::listOf(GraphQLType::nonNull(GraphQLType::string()))],
            'countryCodes' => ['type' => GraphQLType::listOf(GraphQLType::nonNull(GraphQLType::string()))],
            'slug' => ['type' => GraphQLType::string()],
            'taxa' => ['type' => GraphQLType::listOf(GraphQLType::nonNull(GraphQLType::int()))],
            'suppliers' => ['type' => GraphQLType::listOf(GraphQLType::nonNull(GraphQLType::int()))],
            'products' => ['type' => GraphQLType::listOf(GraphQLType::nonNull(GraphQLType::int()))],
            'variants' => ['type' => GraphQLType::listOf(GraphQLType::nonNull(GraphQLType::int()))],
            'promo' => ['type' => GraphQLType::boolean()],
            'wholesale' => ['type' => GraphQLType::boolean()],
            'preOrder' => ['type' => GraphQLType::boolean()],
            'options' => ['type' => GraphQLType::listOf(GraphQLType::nonNull(new OptionType()))]
        ];

        parent::__construct($config);
    }

    public function getName(): string
    {
        return $this->name;
    }
}
