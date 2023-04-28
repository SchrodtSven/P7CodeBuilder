<?php 

declare(strict_types=1);
/**
 * Defining public constants for symbols
 * 
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @author Sven Schrodt<sven@schrodt.club>
 * @package P7CodeBuilder
 * @version 0.1
 */
namespace P7CodeBuilder\Data\Text;

class Symbol
{

    // simple symbols
    
    /**
     * public constant name for underscore (aliases: underline, underdash, low line or low dash)
     * 
     * @var string
     */
    public const SINGLE_UNDERSCORE = "_";
    
    public const SINGLE_HYPHEN = "-";
    
    public const SINGLE_QUOTE = "'";

    public const DOUBLE_QUOTE = '"';

    public const TICK = "´";

    public const BACKTICK = "`";

    public const DEFAULT_ASSIGNMENT_IDENTIFIER = ' = ';

    public const ARRAY_ASSIGNMENT_IDENTIFIER = ' => ';

    public const OPEN_PARENTHESIS = '(';

    public const CLOSE_PARENTHESIS = ')';

    public const OPEN_CROTCHET = '[';

    public const CLOSE_CROTCHET = ']';

    public const OPEN_BRACE = '{';

    public const CLOSE_BRACE = '}';

    public const OPEN_TYPO_DOUBLE_QUOTE = '“';

    public const CLOSE_TYPO_DOUBLE_QUOTE = '”';
}