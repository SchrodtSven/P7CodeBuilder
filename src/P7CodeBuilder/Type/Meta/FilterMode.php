<?php

declare(strict_types=1);
/**
 * Defining constants for text filtering - used within P7CodeBuilder\Type{*}Filter classes
 * 
 * - OOP API for string manipulations
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @package P7CodeBuilder
 * @version 0.1
 * @since 2023-04-23
 */
namespace P7CodeBuilder\Type\Meta;

class FilterMode
{
    public const TEXT_FILTER_EQ = 0; // equals
    public const TEXT_FILTER_NE = 1; // not equals
    public const TEXT_FILTER_CONT = 2; // contains
    public const TEXT_FILTER_NOT_CONT = 3; // not contains
    public const TEXT_FILTER_STARTS = 4; // starts with
    public const TEXT_FILTER_NOT_STARTS = 5; // not starts with
    public const TEXT_FILTER_ENDS = 8; // not ends with
    public const TEXT_FILTER_NOT_ENDS = 9; // ends with
    public const TEXT_FILTER_REGEX = 16; // matches regular expression pattern
    
}