<?php 

declare(strict_types=1);
/**
 * Entity class representing PHP expressions:
 * 
 * - 2 + 3;
 * - $a = ($foo % 3 ===0) ? true : false;
 * 
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @author Sven Schrodt<sven@schrodt.club>
 * @package P7CodeBuilder
 * @version 0.1
 * @since 2023-05-03
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
    private ListClass $expressionParts;

    public function __construct
    (
        
    )
    
  /**
   * $a = 23 Basic Assigment operator: set $a to the value 23
   *
   * @param mixed $operand
   * @return self
   */

   public function basicSetTo(mixed $operand): self
   {
    $this->parts->push('=')->push($operand);
    return $this;
   }



  /**
   * $a == $b Equal true if $a is equal to $b after type juggling.
   *
   * @param mixed $operand
   * @return self
   */

   public function compareEqual(mixed $operand): self
   {
    $this->parts->push(' == ')->push($operand);
    return $this;
   }



  /**
   * $a === $b Identical true if $a is equal to $b, and they are of the same type.
   *
   * @param mixed $operand
   * @return self
   */

   public function compareIdentical(mixed $operand): self
   {
    $this->parts->push(' === ')->push($operand);
    return $this;
   }



  /**
   * $a != $b Not equal true if $a is not equal to $b after type juggling.
   *
   * @param mixed $operand
   * @return self
   */

   public function compareNotEqual(mixed $operand): self
   {
    $this->parts->push(' != ')->push($operand);
    return $this;
   }



  /**
   * $a <> $b Not equal true if $a is not equal to $b after type juggling.
   *
   * @param mixed $operand
   * @return self
   */

   public function compareNotEqualVariant(mixed $operand): self
   {
    $this->parts->push(' <> ')->push($operand);
    return $this;
   }



  /**
   * $a !== $b Not identical true if $a is not equal to $b, or they are not of the same type.
   *
   * @param mixed $operand
   * @return self
   */

   public function compareNotIdentical(mixed $operand): self
   {
    $this->parts->push(' !== ')->push($operand);
    return $this;
   }



  /**
   * $a < $b Less than true if $a is strictly less than $b.
   *
   * @param mixed $operand
   * @return self
   */

   public function compareLessThan(mixed $operand): self
   {
    $this->parts->push(' < ')->push($operand);
    return $this;
   }



  /**
   * $a > $b Greater than true if $a is strictly greater than $b.
   *
   * @param mixed $operand
   * @return self
   */

   public function compareGreaterThan(mixed $operand): self
   {
    $this->parts->push(' > ')->push($operand);
    return $this;
   }



  /**
   * $a <= $b Less than or equal to true if $a is less than or equal to $b.
   *
   * @param mixed $operand
   * @return self
   */

   public function compareLessThanOrEqualTo(mixed $operand): self
   {
    $this->parts->push(' <= ')->push($operand);
    return $this;
   }



  /**
   * $a >= $b Greater than or equal to true if $a is greater than or equal to $b.
   *
   * @param mixed $operand
   * @return self
   */

   public function compareGreaterThanOrEqualTo(mixed $operand): self
   {
    $this->parts->push(' >= ')->push($operand);
    return $this;
   }



  /**
   * $a <=> $b Spaceship An int less than, equal to, or greater than zero when $a is less than, equal to, or greater than $b, respectively.
   *
   * @param mixed $operand
   * @return self
   */

   public function compareAnakinSShip(mixed $operand): self
   {
    $this->parts->push(' <=> ')->push($operand);
    return $this;
   }



  /**
   * $a & $b And Bits that are set in both $a and $b are set.
   *
   * @param mixed $operand
   * @return self
   */

   public function bitAnd(mixed $operand): self
   {
    $this->parts->push(' & ')->push($operand);
    return $this;
   }



  /**
   * $a | $b Or (inclusive or) Bits that are set in either $a or $b are set.
   *
   * @param mixed $operand
   * @return self
   */

   public function bitOrInclusiveOr(mixed $operand): self
   {
    $this->parts->push(' | ')->push($operand);
    return $this;
   }



  /**
   * $a ^ $b Xor (exclusive or) Bits that are set in $a or $b but not both are set.
   *
   * @param mixed $operand
   * @return self
   */

   public function bitXorExclusiveOr(mixed $operand): self
   {
    $this->parts->push(' ^ ')->push($operand);
    return $this;
   }



  /**
   * ~ $a Not Bits that are set in $a are not set, and vice versa.
   *
   * @param mixed $operand
   * @return self
   */

   public function bitNot(mixed $operand): self
   {
    $this->parts->push('~ ')->push($operand);
    return $this;
   }



  /**
   * $a << $b Shift left Shift the bits of $a $b steps to the left (each step means "multiply by two")
   *
   * @param mixed $operand
   * @return self
   */

   public function bitShiftLeft(mixed $operand): self
   {
    $this->parts->push(' << ')->push($operand);
    return $this;
   }



  /**
   * $a >> $b Shift right Shift the bits of $a $b steps to the right (each step means "divide by two")
   *
   * @param mixed $operand
   * @return self
   */

   public function bitShiftRight(mixed $operand): self
   {
    $this->parts->push(' >> ')->push($operand);
    return $this;
   }



  /**
   * +$a Identity Conversion of $a to int or float as appropriate.
   *
   * @param mixed $operand
   * @return self
   */

   public function arithIdentity(mixed $operand): self
   {
    $this->parts->push('+')->push($operand);
    return $this;
   }



  /**
   * -$a Negation Opposite of $a.
   *
   * @param mixed $operand
   * @return self
   */

   public function arithNegation(mixed $operand): self
   {
    $this->parts->push('-')->push($operand);
    return $this;
   }



  /**
   * $a + $b Addition Sum of $a and $b.
   *
   * @param mixed $operand
   * @return self
   */

   public function arithAddition(mixed $operand): self
   {
    $this->parts->push(' + ')->push($operand);
    return $this;
   }



  /**
   * $a - $b Subtraction Difference of $a and $b.
   *
   * @param mixed $operand
   * @return self
   */

   public function arithSubtraction(mixed $operand): self
   {
    $this->parts->push(' - ')->push($operand);
    return $this;
   }



  /**
   * $a * $b Multiplication Product of $a and $b.
   *
   * @param mixed $operand
   * @return self
   */

   public function arithMultiplication(mixed $operand): self
   {
    $this->parts->push(' * ')->push($operand);
    return $this;
   }



  /**
   * $a / $b Division Quotient of $a and $b.
   *
   * @param mixed $operand
   * @return self
   */

   public function arithDivision(mixed $operand): self
   {
    $this->parts->push(' / ')->push($operand);
    return $this;
   }



  /**
   * $a % $b Modulo Remainder of $a divided by $b.
   *
   * @param mixed $operand
   * @return self
   */

   public function arithModulo(mixed $operand): self
   {
    $this->parts->push(' % ')->push($operand);
    return $this;
   }



  /**
   * $a ** $b Exponentiation Result of raising $a to the $b`th power.
   *
   * @param mixed $operand
   * @return self
   */

   public function arithExponentiation(mixed $operand): self
   {
    $this->parts->push(' ** ')->push($operand);
    return $this;
   }



  /**
   * $a += $b $a = $a + $b Addition
   *
   * @param mixed $operand
   * @return self
   */

   public function arithAssignAddition(mixed $operand): self
   {
    $this->parts->push(' += ')->push($operand);
    return $this;
   }



  /**
   * $a -= $b $a = $a - $b Subtraction
   *
   * @param mixed $operand
   * @return self
   */

   public function arithAssignSubtraction(mixed $operand): self
   {
    $this->parts->push(' -= ')->push($operand);
    return $this;
   }



  /**
   * $a *= $b $a = $a * $b Multiplication
   *
   * @param mixed $operand
   * @return self
   */

   public function arithAssignMultiplication(mixed $operand): self
   {
    $this->parts->push(' *= ')->push($operand);
    return $this;
   }



  /**
   * $a /= $b $a = $a / $b Division
   *
   * @param mixed $operand
   * @return self
   */

   public function arithAssignDivision(mixed $operand): self
   {
    $this->parts->push(' /= ')->push($operand);
    return $this;
   }



  /**
   * $a %= $b $a = $a % $b Modulus
   *
   * @param mixed $operand
   * @return self
   */

   public function arithAssignModulus(mixed $operand): self
   {
    $this->parts->push(' %= ')->push($operand);
    return $this;
   }



  /**
   * $a **= $b $a = $a ** $b Exponentiation
   *
   * @param mixed $operand
   * @return self
   */

   public function arithAssignExponentiation(mixed $operand): self
   {
    $this->parts->push(' **= ')->push($operand);
    return $this;
   }



  /**
   * $a &= $b $a = $a & $b Bitwise And
   *
   * @param mixed $operand
   * @return self
   */

   public function bitAssignAnd(mixed $operand): self
   {
    $this->parts->push(' &= ')->push($operand);
    return $this;
   }



  /**
   * $a |= $b $a = $a | $b Bitwise Or
   *
   * @param mixed $operand
   * @return self
   */

   public function bitAssignOr(mixed $operand): self
   {
    $this->parts->push(' |= ')->push($operand);
    return $this;
   }



  /**
   * $a ^= $b $a = $a ^ $b Bitwise Xor
   *
   * @param mixed $operand
   * @return self
   */

   public function bitAssignXor(mixed $operand): self
   {
    $this->parts->push(' ^= ')->push($operand);
    return $this;
   }



  /**
   * $a <<= $b $a = $a << $b Left Shift
   *
   * @param mixed $operand
   * @return self
   */

   public function bitAssignLeftShift(mixed $operand): self
   {
    $this->parts->push(' <<= ')->push($operand);
    return $this;
   }



  /**
   * $a >>= $b $a = $a >> $b Right Shift
   *
   * @param mixed $operand
   * @return self
   */

   public function bitAssignRightShift(mixed $operand): self
   {
    $this->parts->push(' >>= ')->push($operand);
    return $this;
   }



  /**
   * $a .= $b $a = $a . $b String Concatenation
   *
   * @param mixed $operand
   * @return self
   */

   public function assignStringConcatenation(mixed $operand): self
   {
    $this->parts->push(' .= ')->push($operand);
    return $this;
   }



  /**
   * $a ??= $b $a = $a ?? $b Null Coalesce
   *
   * @param mixed $operand
   * @return self
   */

   public function assignNullCoalesce(mixed $operand): self
   {
    $this->parts->push(' ??= ')->push($operand);
    return $this;
   }




    /**
     * “Magical interceptor” function implementing \Stringable interface 
     * returning  textual representation of current state 
     * 
     * @return string
     */
    public function __toString(): string
    {
    
        return (string) $this->expressionParts->join('');
    }
}