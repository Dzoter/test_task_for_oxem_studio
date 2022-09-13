<?php

require_once __DIR__ . "/vendor/autoload.php";

use app\models\Farm;


$farm = new Farm(['cow'=>10,'chicken'=>20]);



print $farm->animalsInfo();



//идут дни
$farm->oneDayResult();
$farm->oneDayResult();
$farm->oneDayResult();
$farm->oneDayResult();
$farm->oneDayResult();
$farm->oneDayResult();
$farm->oneDayResult();


print $farm->countAnimalsProduct();

$farm->addAnimals(['chicken'=>5,'cow'=>1]);

print $farm->animalsInfo();

//идут дни
$farm->oneDayResult();
$farm->oneDayResult();
$farm->oneDayResult();
$farm->oneDayResult();
$farm->oneDayResult();
$farm->oneDayResult();
$farm->oneDayResult();

print $farm->countAnimalsProduct();





