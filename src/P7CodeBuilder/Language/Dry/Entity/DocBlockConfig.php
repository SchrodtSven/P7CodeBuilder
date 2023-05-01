<?php 

declare(strict_types=1);
/**
 * Entity class for doc block line '* @tag value' - e.g: <code> * @package P7CodeBuilder<code>
 * 
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @author Sven Schrodt<sven@schrodt.club>
 * @package P7CodeBuilder
 * @version 0.1
 */

namespace P7CodeBuilder\Language\Dry\Entity;

class DocBlockConfig
{
    private string $indentMark = "    ";

    private int $indentLevel = 1; 
    
    
}