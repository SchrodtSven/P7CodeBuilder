<?php

declare(strict_types=1);
/**
 * Class for instances representing string(s) as object 
 * 
 * - OOP API for string manipulations
 * 
 * Using mb* functions internally, if applicable
 * 
 * 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @package P7CodeBuilder
 * @version 0.1
 * @since 2023-04-23
 */

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