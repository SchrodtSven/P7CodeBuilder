<?php 

declare(strict_types=1);
/**
 * Entity class representing PHP properties (with optional declaration and default) examples:
 * <code>
 * int $a;
 * protected float $b;
 * private string $c; 
 * public static bool $flag;
 * private bool $flag = false;
 * </code>
 * 
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @author Sven Schrodt<sven@schrodt.club>
 * @package P7CodeBuilder
 * @version 0.1
 * @since 2023-05-02
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
    public function __construct
    (
        private string $name, 
        private string $type,
        private bool $isStatic = false,
        private mixed $default = null,
        private string $visibility = Core::VISI_PRIV
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
        $prefix = $this->visibility;
        if($this->isStatic) {
            $prefix .= ' ' . Core::STATIC_KEYWORD;
        }

        $suffix = (is_null($this->default)) 
            ? ''
            : ' = ' . $this->default;

        return (string) (
            new ListClass(
            [
                $prefix,
                $this->type,
                '$' . $this->name,
                $suffix
            ]
        ))->join(' ')
        ->trim();
    }
}