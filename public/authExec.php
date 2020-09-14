<?php

require_once '../bootstrap/bootstrap.php';

use App\Controllers\BaseController;

$controller = new BaseController();
$controller->authExec();

