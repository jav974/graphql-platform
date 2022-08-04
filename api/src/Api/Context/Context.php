<?php

namespace App\Api\Context;

class Context
{
    private static array $context = [
        'filters' => []
    ];

    public static function catalogFilters(array $context): array
    {
        $info = $context['info'];
        $path = implode('.', $info->path);
        $filters = $context['args']['filters'] ?? null;

        // Filters are defined on this query args, save and return
        if ($filters) {
            return self::$context['filters'][$path] = $filters;
        }

        // Try to find filters from higher in path
        return self::findFromContext('filters', $path) ?? [];
    }

    private static function findFromContext(string $property, string $path): mixed
    {
        $maxLength = 0;
        $best = null;

        foreach (self::$context[$property] as $propertyPath => $propertyValue) {
            if (str_starts_with($path, $propertyPath)) {
                $length = strlen($propertyPath);

                if ($length > $maxLength) {
                    $maxLength = $length;
                    $best = $propertyValue;
                }
            }
        }

        return $best;
    }
}
