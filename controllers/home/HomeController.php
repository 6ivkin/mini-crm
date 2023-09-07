<?php

namespace controllers\home;

use models\Check;

class HomeController
{

    public function index()
    {
        include 'app/views/index.php';
    }
}