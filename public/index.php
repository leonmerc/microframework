<?php

require '../vendor/autoload.php';
require '../framework/startup.php';

use Framework\Core\Router;
use Framework\Core\Request;

Router::setup('../webpage/routes.php')
        ::direct(Request::method(),Request::path());