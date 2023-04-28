<?php

declare(strict_types=1);
/**
 * Class storing symbols and rules for the basic syntax of the PHP language
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @package P7CodeBuilder
 * @version 0.1
 * @since 2023-04-28
 */


namespace P7CodeBuilder\Language\Php;

class Core
{
     // Arithmentic operators

     // +$a Identity Conversion of $a to int or float as appropriate.
    public const ARITH_OP_IDENTITY = '+';

    // -$a Negation Opposite of $a.
    public const ARITH_OP_NEGATION = '-';

    // $a + $b Addition Sum of $a and $b.
    public const ARITH_OP_ADDITION = ' + ';

    // $a - $b Subtraction Difference of $a and $b.
    public const ARITH_OP_SUBTRACTION = ' - ';

    // $a * $b Multiplication Product of $a and $b.
    public const ARITH_OP_MULTIPLICATION = ' * ';

    // $a / $b Division Quotient of $a and $b.
    public const ARITH_OP_DIVISION = ' / ';

    // $a % $b Modulo Remainder of $a divided by $b.
    public const ARITH_OP_MODULO = ' % ';

    // $a ** $b Exponentiation Result of raising $a to the $b'th power.
    public const ARITH_OP_EXPONENTIATION = ' ** ';
}