<?php

require_once 'src/P7CodeBuilder/Autoload.php';
use P7CodeBuilder\Type\ListClass;
use P7CodeBuilder\Type\Operational\ListFilterMode;
use P7CodeBuilder\Type\StringClass;
use P7CodeBuilder\Language\Generic\Assignment;
use P7CodeBuilder\Data\Text\Mocking\PersonalData;

use P7CodeBuilder\Language\Html\Core\Element;

$h = new Element('h1', ['id' => '7778Foo', "class" => "main"], 'Lorem Ipsum');
$h->setAttribute('readonly', 'true');
echo $h;
var_dump($h);