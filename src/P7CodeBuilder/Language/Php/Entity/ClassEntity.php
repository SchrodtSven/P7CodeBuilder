<?php 

declare(strict_types=1);
/**
 * Entity class representing PHP classes
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
use P7CodeBuilder\Type\StringClass;

class ClassEntity
{

    private ListClass $properties;

    private ListClass $functions;

    protected static $foo = '';


    public function __construct(
                                private string $name,
                                private bool $isAbstract = false,
                                private bool $isFinal = false
                                )
    {
        
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    

    /**
     * Get the value of isAbstract
     */
    public function getIsAbstract()
    {
        return $this->isAbstract;
    }

    /**
     * Set the value of isAbstract
     */
    public function setIsAbstract($isAbstract): self
    {
        $this->isAbstract = $isAbstract;

        return $this;
    }
}