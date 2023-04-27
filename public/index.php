<?php

require_once 'src/P7CodeBuilder/Autoload.php';
use P7CodeBuilder\Type\ListClass;
use P7CodeBuilder\Type\Operational\ListFilterMode;
use P7CodeBuilder\Type\StringClass;

$t = ListClass::createFromJsonFile('data/people.json');

//$f = $t->filterBy('gender')->genericTextFilter('Male', ListFilterMode::TEXT_FILTER_NE)->getFiltered();

$list = new ListClass([]);
foreach ($t as $item) {

    $txt = (new ListClass(
        [
            $item['firstName'],
            $item['lastName'],
            $item['email'],
            $item['domain'],
            $item['city']
        ]
        )
    )->join(' ');


    
    $midLength = ceil($txt->length() /2);
    $totalLength = $txt->length();
    
    $lastOffset = $totalLength - 1;

    $start = $txt->subString(0, rand(1, $midLength));

    $end = $txt->subString(rand($midLength, $lastOffset-3), $lastOffset);
    
    $mid = $txt->subString(rand(0, $midLength), rand(1, $midLength));

    $t = new ListClass(
        [
            $txt,
            $start,
            $end,
            $mid
        ]
    );


    $t->walk(function(&$assign) {
        $assign = (new StringClass($assign))->quote();
    });



    $list->push((new StringClass($t->join(',' . PHP_EOL . '     ')))->prepend('    [')->append('],'));
    
}

echo ($list->join(PHP_EOL))->prepend(PHP_EOL . '[' . PHP_EOL)->append(PHP_EOL . '];' . PHP_EOL);

//var_dump(count($f));