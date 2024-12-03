<?php

namespace app\controllers;

use function header;
use function redirect;
use function var_dump;

class User
{
    public function show($params)
    {
        if (!isset($params['user'])) {
            return redirect('/');
        }

        $user = findBy('users', 'id', $params['user']);

        var_dump($user);
        die();
    }

}