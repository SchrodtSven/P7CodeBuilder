<?php

require_once 'src/P7CodeBuilder/Autoload.php';
use P7CodeBuilder\Type\ListClass;
use P7CodeBuilder\Type\Operational\ListFilterMode;
use P7CodeBuilder\Type\StringClass;
use P7CodeBuilder\Language\Generic\Assignment;
use P7CodeBuilder\Data\Text\Mocking\PersonalData;

use P7CodeBuilder\Language\Html\Core\Element;
use P7CodeBuilder\Language\Dry\SimpleParser;

use P7CodeBuilder\Language\Dry\Entity\DocBlockLine;


$parser = new SimpleParser();

$lines = [
    new DocBlockLine('author', 'Schrodt'),
    new DocBlockLine('since', '2023-05-29'),
    new DocBlockLine('param', 'string $foo')
];



$parser->DOC = 'Coolest function ever';

$parser->RET = '23';
$parser->RTYPE = 'int';

$parser->FUNCNAME = 'doItForMe';
$parser->CODE = 'do Nothing()';
$parser->LINES = implode(PHP_EOL, $lines);
$parser->SIG = 'string $foo';
$parser->VISI = 'public';
$parser->STATIC = '';

echo $parser->render();
//var_dump($parser);


//public  function 

