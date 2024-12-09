<?php

namespace app\controllers;

use function all;
use function var_dump;

class Login
{
    public function index()
    {
        return [
            'view' => 'login.php',
            'data' => ['title' => 'Login']
        ];
    }

    public function store()
    {
        var_dump('login');
        die();
    }
}