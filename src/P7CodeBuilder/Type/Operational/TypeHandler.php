<?php

namespace P7CodeBuilder\Type\Operational;

class TypeHandler
{
    public function detectType(mixed $value): string
    {
        $first = \gettype($value);
        return match($first) {
            'boolean' => 'bool',
            'object' => $value::class,
            'double' => 'float',
            'integer' => 'int',
            default => $first 
        };
    }
}