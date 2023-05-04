<?php

require_once 'src/P7CodeBuilder/Autoload.php';
use P7CodeBuilder\Type\ListClass;
use P7CodeBuilder\Type\Meta\FilterMode;
use P7CodeBuilder\Type\Operational\ListFilter;
use P7CodeBuilder\Type\StringClass;

use P7CodeBuilder\Type\Operational\TypeHandler;
use P7CodeBuilder\Type\Operational\ArrayHandler;
use P7CodeBuilder\Type\Operational\TextFileFilter;
use P7CodeBuilder\Language\Php\SnippetFactory;

$fac = new SnippetFactory();

$textFilter = new TextFileFilter(ListClass::createFromFile('tmp_stuff/ops.txt'));
$tmp = require_once 'data/Mocking/jobTitle_uniq.php';

$doc = 'DOC_ ';
$asg = 'ASSGN_ ';

$docList = $textFilter->startsWith($doc);
$asgList = $textFilter->startsWith($asg);

$docList->walk(function(&$item) use($doc) {
    $item = (new StringClass($item))->replace($doc)->trim();
});

$asgList->walk(function(&$item) use($asg) {
    $item = (new StringClass($item))->replace($asg)->trim();
});

while(count($docList)) {

    $currDoc = $docList->shift();
    $currAsg =$asgList->shift();
    $currAsg->camelize()->replace('Op');
    $tmp = $currAsg->splitBy(' = ');
    $mthod = $tmp[0];
    $operator =  str_replace(';', '', $tmp[1]);
    $code = '$this->parts->push(' . $operator . ')->push($operand);'; 
    echo $fac->getFunctionDeclaration($mthod, '(mixed $operand)', 'self', '$this', $currDoc, $code, 'public', '@param mixed $operand');
}



/*
print_r($docList->getAsArray());

print_r($asgList->getAsArray());
*/