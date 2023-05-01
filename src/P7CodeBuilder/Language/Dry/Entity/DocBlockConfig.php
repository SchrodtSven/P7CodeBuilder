<?php 

declare(strict_types=1);
/**
 * Class configuring DocBlock parsing:
 * 
 *  - placeholder constants
 *  - indent marks
 *  - indent levels
 *  - 
 * 
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @author Sven Schrodt<sven@schrodt.club>
 * @package P7CodeBuilder
 * @version 0.1
 */

namespace P7CodeBuilder\Language\Dry\Entity;

class DocBlockConfig
{
    private string $indentMark =  "    ";

    private int $indentLevel = 1; 
    
    public const  LINE_TPL = ('   * @{{TAG}} {{CONTENT}}');

    public const TAG_PLACEHOLDER = '{{TAG}}';

    public const TAG_CONTENT_PLACEHOLDER = '{{CONTENT}}';



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
     * Set the value of indentLevel
     *
     * @param int $indentLevel
     *
     * @return self
     */
    public function setIndentLevel(int $indentLevel): self
    {
        $this->indentLevel = $indentLevel;
        return $this;
    }
}