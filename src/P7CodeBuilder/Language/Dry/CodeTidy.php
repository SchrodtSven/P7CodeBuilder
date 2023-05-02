<?php
/**
 * Providing formatting functions
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @package P7CodeBuilder
 * @version 0.1
 * @since 2023-05-02
 */



namespace P7CodeBuilder\Language\Dry;
use P7CodeBuilder\Type\StringClass;
use P7CodeBuilder\Type\HashMap;
use P7CodeBuilder\Type\ListClass;

class CodeTidy
{
    
    public function __construct()
    {
        
    }

    public function indentLines(StringClass $lines, int $indent=8)
    {
        $list =  $lines->splitBy(PHP_EOL);

        return $list->walk(function(&$item) use($indent) {
                    $item = (new StringClass($item))->prepend(\str_repeat(' ', $indent));
                }
                )->join(PHP_EOL);

        
    }

}