<?php

require_once '../vendor/autoload.php';

use App\Controllers\ErrorController;

$controller = new ErrorController();
$controller->page404();
