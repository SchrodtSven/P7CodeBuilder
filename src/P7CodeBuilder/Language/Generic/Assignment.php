<?php

namespace P7CodeBuilder\Language\Generic;
use P7CodeBuilder\Type\StringClass;
use P7CodeBuilder\Type\ListClass;
class Assignment
{
    protected ListClass $assignment;

    public function __construct(private string $left, private string $right, private string $operator = ' = ')
    {
       $this->assignment = (new ListClass)
            ->push($left)
            ->push($operator)
            ->push($right);

    }

    public function __toString(): string
    {
        return sprintf('%s %s %s', $this->left, $this->operator, $this->right);
    }
}