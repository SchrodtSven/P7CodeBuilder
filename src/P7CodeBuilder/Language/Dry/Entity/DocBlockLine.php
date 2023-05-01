<?php 

declare(strict_types=1);
/**
 * Entity class for doc block line '* @tag value' - e.g: <code> * @package P7CodeBuilder</code>
 * 
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @author Sven Schrodt<sven@schrodt.club>
 * @package P7CodeBuilder
 * @version 0.1
 */

namespace P7CodeBuilder\Language\Dry\Entity;
use P7CodeBuilder\Type\StringClass;

class DocBlockLine
{
    private string $lineTpl = ('   * @{{TAG}} {{CONTENT}}');
    private StringClass $parsed;

    public function __construct(string $content, string $tag = '')
    {
        //(string) 
        $this->parsed = (
                        New StringClass($this->lineTpl))
                        ->replaceMultiple(
                            ['{{TAG}}', '{{CONTENT}}'],
                            [$tag, $content]
                        );
        if($tag === '') {
            $this->parsed->replace('* @', '* ')
            ->replace('*  ', '* ');
        }

        

    }

    public function __toString(): string 
    {
        return (string) $this->parsed;
    }
}