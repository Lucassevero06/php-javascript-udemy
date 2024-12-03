<?php

function controller($matchedUri, $params) {
    [$controller, $method] = explode('@', array_values($matchedUri)[0]);
    $controllerWithNamespace = CONTROLLER_PATH.$controller;
    if (!class_exists($controllerWithNamespace)) {
        throw new Exception("Controller {$controller} não encontrado ou não existe");
    }

    $controllerInstance = new $controllerWithNamespace();

    if (!method_exists($controllerInstance, $method)) {
        throw new Exception("Método {$method} não encontrado  no controller {$controller}");
    }
    return $controllerInstance->$method($params);
}