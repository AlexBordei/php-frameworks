<?php

require_once('Controllers/FilterController.php');
require_once('Models/FilterModel.php');
require_once('Views/FilterView.php');

$controller_obj = new Filter\FilterController;

$controller_obj->load();
