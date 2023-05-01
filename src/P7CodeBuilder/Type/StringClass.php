<?php

declare(strict_types=1);
/**
 * Class for instances representing string(s) as object(s)
 * 
 *  - OOP API for string manipulations wrapping native PHP functions
 *  - & short hand methods
 *  - Using mb* functions internally, if applicable or other UTF-8 solid functions
 *  - Offering rollback for the last operation manipulating textual (string) content
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

class StringClass implements \Stringable
{

    public const EMBRACE_MODE_PARENTHESIS = 1;
    public const EMBRACE_MODE_CROTCHET = 2;
    public const EMBRACE_MODE_BRACE = 4;

    protected string $backup;

    public function __construct(private string $content)
    {

    }

    /**
     * Storing current textual representation for optional rollback
     * 
     * @return self
     */
    public function save(): self
    {
        $this->backup = $this->content;
        return $this;
    }

    /**
     * Restoring previous state of textual representation -> “rolling back” last operation
     */
    public function rollback(): self
    {
        $this->conten = $this->backup;
        return $this;
    }

    /**
     * Splitting current content by $separator
     * 
     * @param string $separator
     * @return ListClass      
     * */
    public function splitBy(string $separator): ListClass
    {
        return new ListClass(\explode($separator, $this->content));
     }

    /**
     * Replacing all ocurrences of string $search with $replace within current content 
     * 
     * Hint: <code>str_replace</code> _itself_ is /utf-8 ready/, thats why *mb_str_replace* does NOT exist.
     *  
     * @param string $search
     * @param string $replace
     * @return StringClass
     */
    public function replace(string $search, string $replace=''): self
    {
        $this->save();
        $this->content = str_replace($search, $replace, $this->content);
        return $this;
    }

     /**
     * Replacing all ocurrences of string in $search with corresponding string in $replace within current content 
     * 
     * Hint: <code>str_replace</code> _itself_ is /utf-8 ready/, thats why *mb_str_replace* does NOT exist.
     *  
     * @param array $search
     * @param array $replace
     * @return StringClass
     */
    public function replaceMultiple(array $search, array $replace): self
    {
        $this->save();
        $this->content = str_replace($search, $replace, $this->content);
        return $this;
    }

    /**
     * Trimming current content
     * 
     * @return self
     */
    public function trim(): self
    {
        $this->save();
        $this->content = trim($this->content);
        return $this;
    }


    /**
     * Prepending $string to current content
     * 
     * @param string $string
     * @return self
     */
    public function prepend(string $string): self
    {
        $this->save();
        $this->content = $string . $this->content;
        return $this;
    }

    /**
     * Appending $string to current content
     * 
     * @param string $string
     * @return self
     */
    
    public function append(string $string): self
    {
        $this->save();
        $this->content .= $string;
        return $this;
    }

    /**
     * Quoting currrent content
     * 
     * @param string $quoteMark
     * @return self
     */
    public function quote(string $quoteMark="'"): self
    {
        $this->save();
        return $this->prepend($quoteMark)->append($quoteMark);
    }


    /**
     *  Enclosing current content with braces/brackets:
     *  - parenthesis () per default
     *  - | crotchet []
     *  - | brace {}
     * 
     * @param int $mode (see: constants)
     * @return self
     */
    public function embrace(int $mode = self::EMBRACE_MODE_PARENTHESIS): self
    {
        $this->save();
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

    /**
     * Returning length of current content
     * 
     * @return int 
     */
    public function length(): int
    {
        return \mb_strlen($this->content);
    }


    /**
     * Getting positional defined substtring of current content
     * 
     * @param int $offset
     * @param ?int $length
     * @return self
     */
    public function subString(int $offset, ?int $length = null): self
    {
        $this->save();
        return new self(
            \substr($this->content, $offset, $length)
        );
    }

    /**
     * Converting current content to upper case
     * 
     * @return self
     */
    public function toUpper(): self
    {
        $this->save();
        $this->content = \strtoupper($this->content);
        return $this;
    }

    /**
     * Converting current content to lower case
     * 
     * @return self
     */
    public function toLower(): self
    {
        $this->save();
        $this->content = \strtolower($this->content);
        return $this;
    }

    /**
     * Checking if current content ends with $end
     * 
     * @param string $end
     * @return self 
     */
    public function ends(string $end): bool
    {
        return \str_ends_with($this->content, $end);
    }

    /**
     * Checking if current content begins with $begin
     * 
     * @param string $begin
     * @return self 
     */
    public function begins(string $begin): bool
    {
        return \str_starts_with($this->content, $begin);
    }

    /**
     * Checking if current content contains $needle
     * 
     * @param string $needle
     * @return self
     */
    public function contains(string $needle): bool
    {
        return \str_contains($this->content, $needle);
    }

    /**
     * “Magical interceptor” function implementing \Stringable interface 
     * 
     * Returning textual representation of current state
     * 
     * @return string
     */
    public function __toString(): string
    {
        return $this->content;
    }
}