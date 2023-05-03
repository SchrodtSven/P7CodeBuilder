<?php

declare(strict_types=1);
/**
 * Unit testing StringClass 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P8
 * @package P8
 * @version 0.1
 * @since 2023-05-02
 */

use PHPUnit\Framework\TestCase;
use P7CodeBuilder\Type\Operational\TypeHandler;

class TypeHandlerTest extends TestCase

{
 

    /**
     * @dataProvider TypeValueProvider()

     */
    public function testIfTypeDetectionWorx(mixed $value, string $expected): void
    {
        $handler = new TypeHandler();
        $this->assertSame($expected, $handler->detectType($value));
        
    }

    public function TypeValueProvider(): array
    {
        return [
                    [1, 'int'],
                    [2.34, 'float'],
                    ['Foo', 'string'],
                    [new stdClass(), 'stdClass'],
                    [new \DateTime(), 'DateTime'],
                    [new TypeHandler(), 'P7CodeBuilder\Type\Operational\TypeHandler'],
                    [true, 'bool'],
                    [[1,2,3], 'array'],
                    [null, 'NULL'],
                    [88/2.5, 'float']
                ];
    }


}