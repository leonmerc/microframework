<?php

use Framework\Database\PdoConnection;
use Framework\Core\Container;


Container::attach('database', PdoConnection::connect(
    require '../config/database.php'
));


/**
 * Here you can include custom binding to the container
 */