<?php

namespace Framework\Database;


interface Connection
{
    public static function connect($config);
}