<?php
/**
 * Collection of static functions matching sub strings by:
 * 
 * - RegExp(s)
 * - Rule(s)
 * - Rule Definition(s)
 * 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @package P7CodeBuilder
 * @version 0.1
 * @since 2023-05-01
 */


namespace P7CodeBuilder\Type\Operational;

class SubStringMatcher
{
    public static function stringsBetween(
                                            string $string, 
                                            string $start, 
                                            
                                            string $end, 
                                            bool $isolatedStringOnly = true
    )
    : string | array
    {
        $pattern = "/{$start}(.*){$end}/U"; // ungreedy modififer
        $start = preg_quote($start);
        $end = preg_quote($end);
        preg_match_all($pattern, $string, $txt);
        return ($isolatedStringOnly) 
           ? $txt[1][0]
           : $txt;    
    }
}