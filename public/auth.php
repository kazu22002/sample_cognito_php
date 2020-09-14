<?php

require_once '../vendor/autoload.php';

use App\Controllers\BaseController;

$controller = new BaseController();
$controller->auth();
