<?php

namespace Framework\Database;

use PDO;
use PDOException;

class PdoConnection implements Connection
{
    public static function connect($config)
    {
        $dsn = $config['driver'].':host='.$config['host'].';dbname='.$config['name'];

        try {
            return new PDO (
                $dsn,
                $config['user'],
                $config['pass'],
                $config['options']
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

}