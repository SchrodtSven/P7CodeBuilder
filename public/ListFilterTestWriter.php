<?php
$fac = new SnippetFactory();

$firstName = new ListClass();
$lastName = new ListClass();
$category = new ListClass();
$longitude = new ListClass();
$latitude = new ListClass();
$carModel = new ListClass();
$macAddr = new ListClass();
$subCategory = new ListClass();
$jobTitle = new ListClass();

$allForMock = new ListClass();
$tmp = json_decode(file_get_contents('data/Mocking/mock_stuff.json'), true);

$keys = (new ListClass(array_keys($tmp[0])));//->quoteAll();
$dir = 'data/Mocking/';
$sfx = '.php';
for($i=0;$i<count($keys);$i++) {
   
    echo sprintf(
        "$%s = require_once '%s';%s",
        $keys[$i],
        $dir . $keys[$i] . $sfx,
        PHP_EOL
    );

}


\var_dump(
    [
        $item,
        $value,
        $mode,
        str_starts_with($item, $value)
    ]
);
//die('line: ' . __LINE__);

$format = '    
   /**
    *  Applying text filter /%s/ - returning instance of ListClass
    * 
    * @param string value
    * @return ListClass
    */
    public function %s(string $value): ListClass
    {
        return $this->genericTextFilter($value, %s)->getFiltered();
    }
 
 ';

// echo sprintf($format, 'equals', 'equals', FilterMode::TEXT_FILTER_EQ);

// die;
$start = 'public const ';
//$filter = TextFileFilter::createFromFile('tmp_stuff/ops.txt');

$const = $filter->genericTextFilter($start, FilterMode::TEXT_FILTER_STARTS)->getFiltered();

ArrayHandler::stringClassify($const);

foreach($const as $line) {
    $parts = $line->replace($start)->splitBy('//');
    ArrayHandler::stringClassify($parts);
    // print_r($parts);
    $docName = (string) $parts[1]->trim();
    $methodName = (string) $parts[1]->trim()->camelize(false, ' ');
    $constName = $parts[0]->trim()->prepend('FilterMode::')->splitBy(' =')[0];
 //    echo "$constName - $methodName - $docName \n";

 echo sprintf($format, $docName, $methodName, $constName);
};

die;
$replace = [
    '_OP',

];

$foo = new SubStringMatcher();
$opList = ListClass::createFromFile('tmp_stuff/ops.txt');
foreach($opList->getAsArray() as $item) {

    
    $opName = (new StringClass($foo->stringsBetween($item, 'const ', ' =')));
    $const = '$operator = Core::' . $opName;
    $opName->replace($replace, '');
    echo $opName . PHP_EOL;
    echo $const . PHP_EOL;
    $a = (new StringClass($item));
}

$line = (New ListClass($item))->join(', ');
$length = $line->length();
$start = $line->subString(0,rand(1, $length-1));
$mid = $line->subString(rand(2, ceil($length/2)-1), ceil($length/2)-1);
$end = $line->subString(-rand(1, $length-1), rand(1, $length-1));//rand(1, $length-1));
$mockData->push(
        ( new ListClass([
                            $line,
                            $start,
                            $length,
                            $mid,
                            $end 
        ]
        ))->quoteByType()->join(', ')->prepend('[')->append(']')
        
    );
    

}

echo $mockData->join(', ' . PHP_EOL)->prepend('[' . PHP_EOL)->append(']');