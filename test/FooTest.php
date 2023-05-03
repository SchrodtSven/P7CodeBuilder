<?php

declare(strict_types=1);
/**
 * Unit testing StringClass 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P8
 * @package P8
 * @version 0.1
 * @since 2023-04-27
 */

use PHPUnit\Framework\TestCase;
use P7CodeBuilder\Type\StringClass;
use P7CodeBuilder\Type\ListClass;
 

class FooTest extends TestCase

{
    
    public function testBasix(): void
    {
        $this->assertSame(2, 1+1);
    }

    
}