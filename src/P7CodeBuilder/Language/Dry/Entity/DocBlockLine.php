<?php

namespace P7CodeBuilder\Language\Dry\Entity;
use P7CodeBuilder\Type\StringClass;

class DocBlockLine
{
    private string $lineTpl = ('   * @{{TAG}} {{CONTENT}}');
    private string $parsed;

    public function __construct(string $tag, string $content)
    {
        $this->parsed = (string) (
                        New StringClass($this->lineTpl))
                        ->replaceMultiple(
                            ['{{TAG}}', '{{CONTENT}}'],
                            [$tag, $content]
                        );

    }

    public function __toString(): string 
    {
        return $this->parsed;
    }
}