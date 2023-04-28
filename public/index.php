<?php

require_once 'src/P7CodeBuilder/Autoload.php';
use P7CodeBuilder\Type\ListClass;
use P7CodeBuilder\Type\Operational\ListFilterMode;
use P7CodeBuilder\Type\StringClass;
use P7CodeBuilder\Language\Generic\Assignment;

$rt = file('tmp_stuff/php_operators.txt');
foreach ($rt as $value) {
  $line = new StringClass($value);
  $parts = $line->splitBy("\t");
  $parts->walk(function (&$item) {
    $item = new StringClass(trim($item));
  });

  //var_dump($parts);die;
  //echo 2 ** 3;
  echo str_repeat(' ', 4) . '// ';
  echo $parts->join(' ');
  echo PHP_EOL;
  echo str_repeat(' ', 4) . 'public const ';
  
  echo 'ARITH_OP_' . $parts[1]->toUpper()->append(' = ');
  echo $parts[0]->replaceMultiple(['$a', '$b'], [''])->quote()->append(';');
  echo PHP_EOL . PHP_EOL;
}
//echo (new Assignment('$a', '23'));