<?php

declare(strict_types=1);
/**
 * Configuration
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @package P7CodeBuilder
 * @version 0.1
 * @since 2023-04-28
 */


namespace P7CodeBuilder\Language\Php;

class Config
{

    public const TPL_DIR = 'src/P7CodeBuilder/Language/Php/Tpl/';

    public const FUNC_DECL = 'FuncDocBlock.tpl';

    public const ARRAY_DECL = 'ArrayDeclMulti.tpl';

    public const CLASS_SKELETON = 'Class.tpl';

    private string $indentMark =  ' ';

    private int $indentLevel = 1; 

    private int $indentWidth = 4; 

    public int $maxLengthMultiLineAssignment = 120;

    public int $maxLengthSingleLineAssignment = 140;

    public int $indentMultiLineAssignment = 20;



    /**
     * Get the value of indentMark
     *
     * @return string
     */
    public function getIndentMark(): string
    {
        return $this->indentMark;
    }

    /**
     * Set the value of indentMark
     *
     * @param string $indentMark
     *
     * @return self
     */
    public function setIndentMark(string $indentMark): self
    {
        $this->indentMark = $indentMark;

        return $this;
    }

    /**
     * Get the value of indentLevel
     *
     * @return int
     */
    public function getIndentLevel(): int
    {
        return $this->indentLevel;
    }

    

    /**
     * Get the value of indentWidth
     *
     * @return int
     */
    public function getIndentWidth(): int
    {
        return $this->indentWidth;
    }

    /**
     * Set the value of indentWidth
     *
     * @param int $indentWidth
     *
     * @return self
     */
    public function setIndentWidth(int $indentWidth): self
    {
        $this->indentWidth = $indentWidth;

        return $this;
    }
}