<?php

namespace app\controllers;

use function redirect;
use function var_dump;

class User
{
    public function show($params)
    {
        if(!isset($params['user'])) {
            return redirect('/');
        }

        $user = findBy('users', 'id', $params['user']);
        var_dump($user);
        die();
    }

    public function create()
    {
        return [
            'view' => 'create.php',
            'data' => ['title' => 'Create'],
        ];
    }

    public function store()
    {
        $validate = validate([
            'name' => 'required',
            'email' => 'email|unique',
            'password' => 'required|maxlen',
        ]);

        if (!$validate) {
            return redirect('/user/create');
        }
    }
}