<?php 

declare(strict_types=1);
/**
 * Entity class representing PHP expressions:
 * 
 * - 2 + 3;
 * - $a = ($foo % 3 ===0) ? true : false;
 * 
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @author Sven Schrodt<sven@schrodt.club>
 * @package P7CodeBuilder
 * @version 0.1
 * @since 2023-05-03
 */

namespace P7CodeBuilder\Language\Php\Entity;
use P7CodeBuilder\Type\StringClass;
use P7CodeBuilder\Language\Php\Core;
use P7CodeBuilder\Language\Php\Config; 
use P7CodeBuilder\Type\ListClass;
use P7CodeBuilder\Type\Meta\ListFilterMode;
use P7CodeBuilder\Type\Operational\ListFilter;


class Property
{
    private ListClass $expressionParts;

    public function __construct
    (
        
    )
    {

    }

    /**
     * “Magical interceptor” function implementing \Stringable interface 
     * returning  textual representation of current state 
     * 
     * @return string
     */
    public function __toString(): string
    {
    
        return (string) $this->expressionParts->join('');
    }
}