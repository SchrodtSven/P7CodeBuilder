<?php
/**
 * Very basic parser class for templating
 * 
 * Providing possibility of accessing objects as arrays
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @package P7CodeBuilder
 * @version 0.1
 * @since 2023-04-27
 */



namespace P7CodeBuilder\Language\Dry;
use P7CodeBuilder\Type\StringClass;
use P7CodeBuilder\Type\HashMap;
use P7CodeBuilder\Type\ListClass;

class SimpleParser
{
    private const START_PLACEHOLDER = '{{';
    private const END_PLACEHOLDER = '}}';
    
    private ListClass $find;
    private ListClass $replace;



    public function __construct(private string $tplName = 'src/P7CodeBuilder/Language/Dry/Tpl/FunctionDocBlock.tpl')
    {
        $this->find = new ListClass(['  ']);
        $this->replace = new ListClass([' ']);
    }

    public function __set(string $name, mixed $value): void
    {
        $this->find->push((
            new StringClass($name))
                ->prepend(self::START_PLACEHOLDER)
                ->append(self::END_PLACEHOLDER)
        );

        $this->replace->push((
            new StringClass($value))
        );
    }

    public function render(): StringClass
    {
        return (new StringClass(\file_get_contents($this->tplName)))
                ->replaceMultiple(
                          $this->find->getContent(),
                          $this->replace->getContent()
                );
    }


}