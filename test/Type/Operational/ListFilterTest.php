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

class ListFilterTest extends TestCase

{
    
    /**
     * @data Provider 
     */
    public function testBasix(): void
    {
        $greatList = require_once('data/Mocking/great_mock_list.php');
        
        
        $tmp2 = require_once('data/Mocking/first_names.php');
        
        $filter = new ListFilter(new ListClass($tmp), 'firstName');
        $counted = array_count_values($tmp2);
        
        //var_dump($counted);die;
        $keys = array_unique(array_keys($counted));
        foreach($keys as $key) {
            
           $tmp3 = $filter->genericTextFilter($key)->getFiltered();
            $this->assertSame(count($tmp3), $counted[$key]);
        };

        $this->assertTrue(2 == 1+1);

    }

    
}