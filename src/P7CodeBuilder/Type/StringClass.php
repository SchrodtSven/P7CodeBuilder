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

class StringClass
{
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