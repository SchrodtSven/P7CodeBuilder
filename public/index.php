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
var_dump($foo->getDataForSplitting());