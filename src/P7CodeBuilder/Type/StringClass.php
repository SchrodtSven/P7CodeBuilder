<?php

declare(strict_types=1);
/**
 * Class for instances representing string(s) as object 
 * 
 * - OOP API for string manipulations
 * 
 * Using mb* functions internally, if applicable
 * 
 * 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @package P7CodeBuilder
 * @version 0.1
 * @since 2023-04-23
 */
namespace P7CodeBuilder\Type;
use P7CodeBuilder\Type\ListClass;
use P7CodeBuilder\Data\Text\Symbol;

class StringClass
{

    public const EMBRACE_MODE_PARENTHESIS = 1;
    public const EMBRACE_MODE_CROTCHET = 2;
    public const EMBRACE_MODE_BRACE = 4;

    public function __construct(private string $content)
    {

    }

    public function splitBy(string $separator): ListClass
    {
        return new ListClass(\explode($separator, $this->content));
        
    }

    /**
     * Replacing all ocurrences of string $search with $replace within current content 
     * 
     * Hint: *str_replace* _itself_ is /utf-8 ready/, thats why *mb_str_replace* does NOT exist.
     *  
     * @param string $search
     * @param string $replace
     * @return StringClass
     */
    public function replace(string $search, string $replace=''): self
    {
        //$this->save();
        $this->content = str_replace($search, $replace, $this->content);
        return $this;
    }

     /**
     * Replacing all ocurrences of string in $search with corresponding string in $replace within current content 
     * 
     * Hint: *str_replace* _itself_ is /utf-8 ready/, thats why *mb_str_replace* does NOT exist.
     *  
     * @param array $search
     * @param array $replace
     * @return StringClass
     */
    public function replaceMultiple(array $search, array $replace): self
    {
        $this->content = str_replace($search, $replace, $this->content);
        return $this;
    }

    public function trim(): self
    {
        $this->content = trim($this->content);
        return $this;
    }


    public function prepend(string $string): self
    {
        $this->content = $string . $this->content;
        return $this;
    }

    public function append(string $string): self
    {
        $this->content .= $string;
        return $this;
    }

    public function quote(string $quoteMark="'"): self
    {
        return $this->prepend($quoteMark)->append($quoteMark);
    }

    public function embrace($mode = self::EMBRACE_MODE_PARENTHESIS): self
    {
        switch($mode) {

            case self::EMBRACE_MODE_BRACE:
                $start = Symbol::OPEN_BRACE;
                $end = Symbol::CLOSE_BRACE;
                break;
            case self::EMBRACE_MODE_CROTCHET:
                $start = Symbol::OPEN_CROTCHET;
                $end = Symbol::CLOSE_CROTCHET;
                break;
            default: 
                $start = Symbol::OPEN_PARENTHESIS;
                $end = Symbol::CLOSE_PARENTHESIS;
                break;
        }

        return $this->append($end)->prepend($start);   
    }

    public function length(): int
    {
        return \mb_strlen($this->content);
    }

    public function subString(int $offset, ?int $length = null): self
    {
        return new self(
            \substr($this->content, $offset, $length)
        );
    }

    public function toUpper(): self
    {
        $this->content = \strtoupper($this->content);
        return $this;
    }

    public function toLower(): self
    {
        $this->content = \strtolower($this->content);
        return $this;
    }

    public function ends(string $end): bool
    {
        return \str_ends_with($this->content, $end);
    }

    public function begins(string $begin): bool
    {
        return \str_starts_with($this->content, $begin);
    }

    public function contains(string $needle): bool
    {
        return \str_contains($this->content, $needle);
    }

    public function __toString(): string
    {
        return $this->content;
    }
}