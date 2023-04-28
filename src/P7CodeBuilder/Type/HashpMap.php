<?php

declare(strict_types=1);
/**
 * Class for instances representing associative array(s) (hash map) as object 
 * 
 * - OOP API for array operations
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @package P7CodeBuilder
 * @version 0.1
 * @since 2023-04-23
 */
namespace P7CodeBuilder\Type;
use P7CodeBuilder\Type\Dry\ArrayAccessTrait;
use P7CodeBuilder\Type\Dry\IteratorTrait;
use P7CodeBuilder\Type\Operational\ListFilter;
use P7CodeBuilder\File\FileError;

class HashMap extends ListClass
{

}