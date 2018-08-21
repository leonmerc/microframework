<?php

namespace Framework\Controllers;

use Framework\Core\View;

class ExampleController
{
    public function introMethod()
    {
        return View::make('helloworld');
    }

}