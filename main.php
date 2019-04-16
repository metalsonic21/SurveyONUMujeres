<?php

include_once './answers.php';
$a = new answers();
$a->constructor($a->getOne(),$a->getTwo(),$a->getThree(),$a->getFour(),$a->getFive(),$a->getSix());
readfile('./home/home.html');
?>
