<?php

require_once 'src/P7CodeBuilder/Autoload.php';
use P7CodeBuilder\Type\ListClass;
use P7CodeBuilder\Type\Meta\ListFilterMode;
use P7CodeBuilder\Type\Operational\ListFilter;
use P7CodeBuilder\Type\StringClass;
use P7CodeBuilder\Type\Operational\SubStringMatcher;

use P7CodeBuilder\Data\Text\Mocking\PersonalData;

use P7CodeBuilder\Language\Html\Core\Element;
use P7CodeBuilder\Language\Dry\SimpleParser;

use P7CodeBuilder\Language\Dry\Entity\DocBlockLine;

use P7CodeBuilder\Language\Php\SnippetFactory;

use  P7CodeBuilder\Language\Php\Entity\Property;

use P7CodeBuilder\Type\Operational\TypeHandler;

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



foreach ($tmp as $item) {
    //var_dump($item);die;
    $line = new ListClass();
    foreach($item as $key => $val) {
        
        $k = (new StringClass($key))->quote();
        $v = (new StringClass($val))->quote();
        
        $line->push((
            new StringClass(sprintf('%s => %s', $k, $v)))
        );
        
    }
    
    $allForMock->push(
                        ($line->join(', '))
                            ->embrace(StringClass::EMBRACE_MODE_CROTCHET)
    );
    
}

echo $allForMock->join(',' . PHP_EOL)->prepend('  return [' . PHP_EOL)->append(PHP_EOL . '  ];');




die;
$keys = array_keys($tmp[0]);foreach ($tmp as $item) {
    $firstName->push($item["firstName"]);
    $lastName->push($item["lastName"]);
    $category->push($item["category"]);
    $longitude->push($item["longitude"]);
    $latitude->push($item["latitude"]);
    $carModel->push($item["carModel"]);
    $macAddr->push($item["macAddr"]);
    $subCategory->push($item["subCategory"]);
    $jobTitle->push($item["jobTitle"]);
}

$firstNameList = (new ListClass($firstName->getAsArray()))->quoteAll()->sort();
$lastNameList = (new ListClass($lastName->getAsArray()))->quoteAll()->sort();
$categoryList = (new ListClass($category->getAsArray()))->quoteAll()->sort();
$longitudeList = (new ListClass($longitude->getAsArray()))->quoteAll()->sort();
$latitudeList = (new ListClass($latitude->getAsArray()))->quoteAll()->sort();
$carModelList = (new ListClass($carModel->getAsArray()))->quoteAll()->sort();
$macAddrList = (new ListClass($macAddr->getAsArray()))->quoteAll()->sort();
$subCategoryList = (new ListClass($subCategory->getAsArray()))->quoteAll()->sort();
$jobTitleList = (new ListClass($jobTitle->getAsArray()))->quoteAll()->sort();


$format = "\$%sStringItem = (new StringClass(\$fac->getAssignmentFromList($%sList, 'firstNames', 'return', 'List of %s (tbc...)')))
->replace(
    ['@var', '$%s ='],
    ['@return', '']
) ;%s";

$firstNameStringItem = (new StringClass($fac->getAssignmentFromList($firstNameList, 'firstNames', 'return', 'List of firstName (tbc...)')))
->replace(
    ['@var', '$firstName ='],
    ['@return', '']
) ;
echo $firstNameStringItem;
$firstNameStringItem = (new StringClass($fac->getAssignmentFromList($firstNameList, 'firstNames', 'return', 'List of firstName (tbc...)')))
->replace(
    ['@var', '$firstName ='],
    ['@return', '']
) ;

$lastNameStringItem = (new StringClass($fac->getAssignmentFromList($lastNameList, 'firstNames', 'return', 'List of lastName (tbc...)')))
->replace(
    ['@var', '$lastName ='],
    ['@return', '']
) ;

$categoryStringItem = (new StringClass($fac->getAssignmentFromList($categoryList, 'firstNames', 'return', 'List of category (tbc...)')))
->replace(
    ['@var', '$category ='],
    ['@return', '']
) ;

$longitudeStringItem = (new StringClass($fac->getAssignmentFromList($longitudeList, 'firstNames', 'return', 'List of longitude (tbc...)')))
->replace(
    ['@var', '$longitude ='],
    ['@return', '']
) ;

$latitudeStringItem = (new StringClass($fac->getAssignmentFromList($latitudeList, 'firstNames', 'return', 'List of latitude (tbc...)')))
->replace(
    ['@var', '$latitude ='],
    ['@return', '']
) ;

$carModelStringItem = (new StringClass($fac->getAssignmentFromList($carModelList, 'firstNames', 'return', 'List of carModel (tbc...)')))
->replace(
    ['@var', '$carModel ='],
    ['@return', '']
) ;

$macAddrStringItem = (new StringClass($fac->getAssignmentFromList($macAddrList, 'firstNames', 'return', 'List of macAddr (tbc...)')))
->replace(
    ['@var', '$macAddr ='],
    ['@return', '']
) ;

$subCategoryStringItem = (new StringClass($fac->getAssignmentFromList($subCategoryList, 'firstNames', 'return', 'List of subCategory (tbc...)')))
->replace(
    ['@var', '$subCategory ='],
    ['@return', '']
) ;

$jobTitleStringItem = (new StringClass($fac->getAssignmentFromList($jobTitleList, 'firstNames', 'return', 'List of jobTitle (tbc...)')))
->replace(
    ['@var', '$jobTitle ='],
    ['@return', '']
) ;


file_put_contents('data/Mocking/firstNameStringItem.php', $firstNameStringItem);

file_put_contents('data/Mocking/lastNameStringItem.php', $lastNameStringItem);

file_put_contents('data/Mocking/categoryStringItem.php', $categoryStringItem);

file_put_contents('data/Mocking/longitudeStringItem.php', $longitudeStringItem);

file_put_contents('data/Mocking/latitudeStringItem.php', $latitudeStringItem);

file_put_contents('data/Mocking/carModelStringItem.php', $carModelStringItem);

file_put_contents('data/Mocking/macAddrStringItem.php', $macAddrStringItem);

file_put_contents('data/Mocking/subCategoryStringItem.php', $subCategoryStringItem);

file_put_contents('data/Mocking/jobTitleStringItem.php', $jobTitleStringItem);


/*
foreach ($keys as $key ) {
   $data =  sprintf($format, $key, $key, $key, $key, PHP_EOL );
    //echo $data . PHP_EOL;
    $fileName = 'data/Mocking/' . $key . 'StringItem.php';
    $dtaString = (string) $key . 'StringItem' ;
    echo PHP_EOL;
    $f2 = "file_put_contents('{$fileName}', \$$dtaString);" . PHP_EOL;
   echo $f2;
}
*/
die;

for($i=0;$i<count($tmp);$i++) {
    $item = $tmp[$i];
    
    foreach($item as $key => $value) {
        $foo = new ListClass();
        $k = (new StringClass($key))->quote();
        $v = (new StringClass($value))->quote();
        
        $foo->push(sprintf('%s => %s', $k, $v));
    }

    $line = (new StringClass($foo->join(', ')));
    
    $line->embrace(StringClass::EMBRACE_MODE_CROTCHET);

    $all->push($line);
    var_dump($line);die;
}

echo (new StringClass($all->join(',' . PHP_EOL)));
