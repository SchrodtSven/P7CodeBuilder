<?php
/**
 * Collection of static functions handling instances of 
 * 
 * - ListClass
 * - HashMap
 * 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @package P7CodeBuilder
 * @version 0.1
 * @since 2023-05-02
 */


namespace P7CodeBuilder\Type\Operational;
use P7CodeBuilder\Type\ListClass;
use P7CodeBuilder\Type\Meta\FilterMode;
use P7CodeBuilder\Type\Operational\ListFilter;
use P7CodeBuilder\Type\StringClass;

class ArrayHandler
{
    /** 
     * Converting all elements to instance of StringClass() 
     * @param string $string 
     */
    public static function stringClassify(ListClass $data): void
    {
        

        $data->walk(function(&$item) {
            $item = match(true) {
                    ($item instanceof StringClass) => $item,
                    (is_string($item)) => new StringClass($item),
                    default => new StringClass((string) $item)
            };
        });

    }
}