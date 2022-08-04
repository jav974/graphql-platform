<?php

namespace App\DependencyInjection\Compiler;

use App\DependencyInjection\Override\FieldsBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class OverrideCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $container->getDefinition('api_platform.graphql.fields_builder')->setClass(FieldsBuilder::class);
    }
}
