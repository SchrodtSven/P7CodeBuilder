<?php

require_once 'src/P7CodeBuilder/Autoload.php';
use P7CodeBuilder\Type\ListClass;
use P7CodeBuilder\Type\Operational\ListFilterMode;
use P7CodeBuilder\Type\StringClass;
use P7CodeBuilder\Language\Generic\Assignment;
use P7CodeBuilder\Data\Text\Mocking\PersonalData;

// $t = ListClass::createFromFile('tmp_stuff/fooblah.txt');

// echo $t->join(', ' . PHP_EOL)->embrace(StringClass::EMBRACE_MODE_CROTCHET);

$foo = new PersonalData();
$repl = [
    ['{', '}'],
    ['[[', ']]'],
    ['*', '*'],
    ['<!-- ', ' -->'],
    ['(', ')']
];

$all = new ListClass();
foreach($foo->getDataForSplitting() as $item)
{
    $enc = array_rand($repl);
    //var_dump($repl[$enc]);
    $original = (new StringClass($item[0]))->trim();
    $half =  ceil($original->length() / 2);
    $offset = rand(0, $half);
    $length = rand($half+1, $original->length()-1);
    //echo  $item[0] . PHP_EOL;
    
    $find =  $original->subString($offset, $length);
    //echo $find . PHP_EOL;
    $replace = (new StringClass($find))->prepend($repl[$enc][0])->append($repl[$enc][1]);
     $new = $original;
     $new->replace($find, $replace);
    $original = $item[0];
    $a = new ListClass(
        [
            $original,
            $find,
            $offset,
            $length
        ]
        
    );
    $all->push((string) $a->quoteByType()->join(', ' . PHP_EOL)->prepend('[')->append(']'));
    
}

echo $all->join(', ' . PHP_EOL)
    ->prepend('[')
    ->append('[]');