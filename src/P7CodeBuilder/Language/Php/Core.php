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
    // $a = 23 Basic Assigment operator: set $a to the value 23
    public const BASIC_OP_SET_TO = ' = ';

    // Comparison Operators ¶

    // $a == $b Equal true if $a is equal to $b after type juggling.
    public const COMPARE_OP_EQUAL = ' == ';

    // $a === $b Identical true if $a is equal to $b, and they are of the same type.
    public const COMPARE_OP_IDENTICAL = ' === ';

    // $a != $b Not equal true if $a is not equal to $b after type juggling.
    public const COMPARE_OP_NOT_EQUAL = ' != ';

    // $a <> $b Not equal true if $a is not equal to $b after type juggling.
    public const COMPARE_OP_NOT_EQUAL_VARIANT = ' <> ';

    // $a !== $b Not identical true if $a is not equal to $b, or they are not of the same type.
    public const COMPARE_OP_NOT_IDENTICAL = ' !== ';

    // $a < $b Less than true if $a is strictly less than $b.
    public const COMPARE_OP_LESS_THAN = ' < ';

    // $a > $b Greater than true if $a is strictly greater than $b.
    public const COMPARE_OP_GREATER_THAN = ' > ';

    // $a <= $b Less than or equal to true if $a is less than or equal to $b.
    public const COMPARE_OP_LESS_THAN_OR_EQUAL_TO = ' <= ';

    // $a >= $b Greater than or equal to true if $a is greater than or equal to $b.
    public const COMPARE_OP_GREATER_THAN_OR_EQUAL_TO = ' >= ';

    // $a <=> $b Spaceship An int less than, equal to, or greater than zero when $a is less than, equal to, or greater than $b, respectively.
    public const COMPARE_OP_ANAKIN_S_SHIP = ' <=> ';

    // Constants for Bitwise Operators

    // $a & $b And Bits that are set in both $a and $b are set.
    public const BIT_OP_AND = ' & ';

    // $a | $b Or (inclusive or) Bits that are set in either $a or $b are set.
    public const BIT_OP_OR_INCLUSIVE_OR = ' | ';

    // $a ^ $b Xor (exclusive or) Bits that are set in $a or $b but not both are set.
    public const BIT_OP_XOR_EXCLUSIVE_OR = ' ^ ';

    // ~ $a Not Bits that are set in $a are not set, and vice versa.
    public const BIT_OP_NOT = '~ ';

    // $a << $b Shift left Shift the bits of $a $b steps to the left (each step means "multiply by two")
    public const BIT_OP_SHIFT_LEFT = ' << ';

    // $a >> $b Shift right Shift the bits of $a $b steps to the right (each step means "divide by two")
    public const BIT_OP_SHIFT_RIGHT = ' >> ';

    // Constants for arithmentic operators

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

    // Arithmetic Assignment Operators ¶

    // $a += $b $a = $a + $b Addition
    public const ARITH_ASSIGN_OP_ADDITION = ' += ';

    // $a -= $b $a = $a - $b Subtraction
    public const ARITH_ASSIGN_OP_SUBTRACTION = ' -= ';

    // $a *= $b $a = $a * $b Multiplication
    public const ARITH_ASSIGN_OP_MULTIPLICATION = ' *= ';

    // $a /= $b $a = $a / $b Division
    public const ARITH_ASSIGN_OP_DIVISION = ' /= ';

    // $a %= $b $a = $a % $b Modulus
    public const ARITH_ASSIGN_OP_MODULUS = ' %= ';

    // $a **= $b $a = $a ** $b Exponentiation
    public const ARITH_ASSIGN_OP_EXPONENTIATION = ' **= ';


    // Bitwise Assignment Operators ¶

    // $a &= $b $a = $a & $b Bitwise And
    public const BIT_ASSIGN_OP_AND = ' &= ';

    // $a |= $b $a = $a | $b Bitwise Or
    public const BIT_ASSIGN_OP_OR = ' |= ';

    // $a ^= $b $a = $a ^ $b Bitwise Xor
    public const BIT_ASSIGN_OP_XOR = ' ^= ';

    // $a <<= $b $a = $a << $b Left Shift
    public const BIT_ASSIGN_OP_LEFT_SHIFT = ' <<= ';

    // $a >>= $b $a = $a >> $b Right Shift
    public const BIT_ASSIGN_OP_RIGHT_SHIFT = ' >>= ';
 
    // Other Assignment operators
    
     // $a .= $b $a = $a . $b String Concatenation
    public const ASSIGN_OP_STRING_CONCATENATION = ' .= ';

    // $a ??= $b $a = $a ?? $b Null Coalesce
    public const ASSIGN_OP_NULL_COALESCE = ' ??= ';

    // Constants for visibilies

    public const VISI_PUB = 'public';

    public const VISI_PROT = 'protected';

    public const VISI_PRIV = 'private';

}