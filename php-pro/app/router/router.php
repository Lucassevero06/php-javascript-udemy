<?php

function routes() {
    return require 'routes.php';
}

//trabalhando com as uri exatas/fixas
function exactMatchUriInArrayRoutes($uri, $routes) {
    return (array_key_exists($uri, $routes)) ? [$uri => $routes[$uri]] : [];
}

//trabalhando com as uri dinamicas
function regularExpressionMatchArrayRoutes($uri, $routes) {
    return array_filter(
        $routes,
        function ($value) use ($uri) {
            $regex = str_replace('/', '\/', ltrim($value, '/'));
            return preg_match("/^$regex$/", ltrim($uri, '/'));
        },
        ARRAY_FILTER_USE_KEY
    );
}

function params($uri, $matchedUri) {
    if (!empty($matchedUri)) {
        $matchedToGetParams = array_keys($matchedUri)[0];
        return array_diff(
            $uri,
            explode('/', ltrim($matchedToGetParams, '/'))
        );
    }
    return [];
}

//formatando os parametros
function paramsFormat($uri, $params) {
    $paramsData = [];
    foreach ($params as $index => $param) {
        $paramsData[$uri[$index -1]] = $param;
    }

    return $paramsData;
}

//trabalhando com as duas funçoes juntas
function router() {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //capturando a uri

    $routes = require 'routes.php';
    $requestMethods = $_SERVER['REQUEST_METHOD'];

    //verificando se a rota existe
    $matchedUri = exactMatchUriInArrayRoutes($uri, $routes[$requestMethods]);

    $params = [];
    if (empty($matchedUri)) {
        $matchedUri = regularExpressionMatchArrayRoutes($uri, $routes[$requestMethods]);
        $uri = explode('/', ltrim($uri, '/'));
        $params = params($uri, $matchedUri);
        $params = paramsFormat($uri, $params);

    }

    if(!empty($matchedUri)) {
        return controller($matchedUri, $params);
    }

    throw new Exception('Algo deu errado');
}