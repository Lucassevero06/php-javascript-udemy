<?php

namespace app\controllers;

use function var_dump;

class Home
{
    public function index($params)
    {
        return [
            'view' => 'home.php',
            'data' => ['name' => 'Lucas']
        ];
    }
}