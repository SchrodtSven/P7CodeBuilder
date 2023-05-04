<?php

declare(strict_types=1);
/**
 * Unit testing ListFilter 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P8
 * @package P8
 * @version 0.1
 * @since 2023-05-02
 */

use PHPUnit\Framework\TestCase;
use P7CodeBuilder\Type\StringClass;
use P7CodeBuilder\Type\ListClass;
use P7CodeBuilder\Type\Operational\ListFilter;
use P7CodeBuilder\Type\Operational\TextFileFilter;

class TextFileFilterTest extends TestCase

{
    /**
     * @dataProvider dataSupplier
     */
    public function testBasix($original, $start, $length, $mid, $end ): void
    {
        $this->assertTrue(str_starts_with($original, $start));

        //@FIXME repair mock data coloumn 'end' in 'data/Mocking/textFileFilter.php'
        //  $this->assertTrue(str_ends_with($original, $end));

        $this->assertTrue(str_contains($original, $mid));
        $this->assertTrue(mb_strlen($original) === $length);
    }

    public function dataSupplier(): array
    {
        return require_once('data/Mocking/textFileFilter.php');       
    }


    public function testEquals()
    {
        $all = require_once 'data/Mocking/jobTitle.php';
        $textFilter = new TextFileFilter(new ListClass($all));
        $tmp = require_once 'data/Mocking/jobTitle_uniq.php';
        $uniqJob = new ListClass($tmp);

        $aggregated = array_count_values($all);
        //file_put_contents('aggr.txt', var_export($aggregated, true));
        foreach ($uniqJob as $value) {
            $filtered = $textFilter->equals($value);
            $this->assertSame(
                $filtered->count(),
                $aggregated[$value]
            );
            $filtered->count();
            
            


    //die;
}
    }

    public function NOtestTextfilterStartsWith()
    {
                
        $list = new ListClass(require_once('data/Mocking/textFileFilter.php'));
        $originalStrings = $list->splitColumn(0);
        var_dump();die;
        $filter = new TextFileFilter($originalStrings);
        var_dump($filter->startsWith('Nic'));
        
    }
}