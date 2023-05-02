<?php

require_once 'src/P7CodeBuilder/Autoload.php';
use P7CodeBuilder\Type\ListClass;
use P7CodeBuilder\Type\Meta\ListFilterMode;
use P7CodeBuilder\Type\Operational\ListFilter;
use P7CodeBuilder\Type\StringClass;
use P7CodeBuilder\Language\Generic\Assignment;
use P7CodeBuilder\Data\Text\Mocking\PersonalData;

use P7CodeBuilder\Language\Html\Core\Element;
use P7CodeBuilder\Language\Dry\SimpleParser;

use P7CodeBuilder\Language\Dry\Entity\DocBlockLine;

use P7CodeBuilder\Language\Php\SnippetFactory;

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


$tmp = json_decode(file_get_contents('data/Mocking/mock_stuff.json'), true);
$keys = new ListClass(array_keys($tmp[0]));


foreach ($tmp as $item) {
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

$firstNameList = (new ListClass(array_unique($firstName->getAsArray())))->quoteAll()->sort();
$lastNameList = (new ListClass(array_unique($lastName->getAsArray())))->quoteAll()->sort();
$categoryList = (new ListClass(array_unique($category->getAsArray())))->quoteAll()->sort();
$longitudeList = (new ListClass(array_unique($longitude->getAsArray())))->quoteAll()->sort();
$latitudeList = (new ListClass(array_unique($latitude->getAsArray())))->quoteAll()->sort();
$carModelList = (new ListClass(array_unique($carModel->getAsArray())))->quoteAll()->sort();
$macAddrList = (new ListClass(array_unique($macAddr->getAsArray())))->quoteAll()->sort();
$subCategoryList = (new ListClass(array_unique($subCategory->getAsArray())))->quoteAll()->sort();
$jobTitleList = (new ListClass(array_unique($jobTitle->getAsArray())))->quoteAll()->sort();

echo $fac->getAssignmentFromList($firstNameList, 'firstNames', 'public', 'List of first names (tbc...)');