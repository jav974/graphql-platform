<?php

namespace App\Type\Definition;

use ApiPlatform\GraphQl\Type\Definition\TypeInterface;
use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\Type as GraphQLType;

class OptionType extends InputObjectType implements TypeInterface
{
    public function __construct(array $config = [])
    {
        $config['name'] = 'Option';
        $config['fields'] = [
            'code' => ['type' => GraphQLType::nonNull(GraphQLType::string())],
            'values' => ['type' => GraphQLType::listOf(GraphQLType::nonNull(GraphQLType::string()))],
        ];

        parent::__construct($config);
    }

    public function getName(): string
    {
        return $this->name;
    }
}
