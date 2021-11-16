<?php

require 'ElectricCar.php';


$electric_car = new ElectricCar();

try {
	$electric_car->setName('Renault Zoedddddd');
} catch (Exception $ex) {
	echo 'Eh, mai gresim si noi...';
}

$electric_car->getName();