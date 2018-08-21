<?php

namespace Framework\Core;


class View
{
    public static function make($view)
    {
        return require "../webpage/views/{$view}.view.php";
    }
}