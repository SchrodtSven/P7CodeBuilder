<?php

require_once 'src/P7CodeBuilder/Autoload.php';
use P7CodeBuilder\Type\ListClass;
use P7CodeBuilder\Type\Meta\FilterMode;
use P7CodeBuilder\Type\Operational\ListFilter;
use P7CodeBuilder\Type\StringClass;
use P7CodeBuilder\Type\Operational\SubStringMatcher;

use P7CodeBuilder\Data\Text\Mocking\PersonalData;

use P7CodeBuilder\Language\Html\Core\Element;
use P7CodeBuilder\Language\Dry\SimpleParser;

use P7CodeBuilder\Language\Dry\Entity\DocBlockLine;

use P7CodeBuilder\Language\Php\SnippetFactory;
use P7CodeBuilder\Language\Php\Core;
use  P7CodeBuilder\Language\Php\Entity\Property;

use P7CodeBuilder\Type\Operational\TypeHandler;
use P7CodeBuilder\Type\Operational\ArrayHandler;
use P7CodeBuilder\Type\Operational\TextFileFilter;

/*
$starts = '* ';
$filter = TextFileFilter::createFromFile('src/P7CodeBuilder/Type/StringClass.php');
var_dump($filter);
var_dump($filter->contains('public function')->getContent());
*/

$all = require_once 'data/Mocking/jobTitle.php';
$textFilter = new TextFileFilter(new ListClass($all));
$tmp = require_once 'data/Mocking/jobTitle_uniq.php';
$uniqJob = new ListClass($tmp);

$aggregated = array_count_values($all);

foreach ($uniqJob as $value) {
    $filtered = $textFilter->equals($value);
    
    $filtered->count();
    
    var_dump($aggregated[$value]);


    //die;
}



$jobs = $list->splitColumn('jobTitle')->sort()->removeDuplicates()->quoteAll();
echo $jobs->join(', ')->prepend('[')->append(']');
//->wrapWords(150));die;
/*foreach ($list as $item) {
    
}
*/