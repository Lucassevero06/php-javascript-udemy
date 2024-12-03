<?php

namespace app\controllers;

use function all;
use function var_dump;

class Home
{
    public function index($params)
    {
        $users = all('users');
        return [
            'view' => 'home.php',
            'data' => ['title' => 'Home', 'users' => $users]
        ];
    }
}