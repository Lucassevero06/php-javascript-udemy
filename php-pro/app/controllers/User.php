<?php

namespace app\controllers;

use function create;
use function redirect;
use function setFlash;
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
            'email' => 'required|email|unique:users',
            'password' => 'required|maxlen:5',
        ]);

        if (!$validate) {
            return redirect('/user/create');
        }

        $validate['password'] = password_hash($validate['password'], PASSWORD_DEFAULT);

        $created = create('users', $validate);

        if(!$created) {
            setFlash('message', 'Ocorreu um erro ao cadastrar, tente novamente em alguns segundos');
            return redirect('/user/create');
        }

        return redirect('/');
    }
}