<?php
function routes() {
    return require 'routes.php';
}
//trabalhando com as uri exatas/fixas
function exactMatchUriInArrayRoutes($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        return [$uri => $routes[$uri]];
    }

    return [];
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
            explode('/', ltrim($uri, '/')),
            explode('/', ltrim($matchedToGetParams, '/'))
        );
    }
    return [];
}

//trabalhando com as duas funçoes juntas
function router() {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //capturando a uri

    $routes = routes();

    //verificando se a rota existe
    $matchedUri = exactMatchUriInArrayRoutes($uri, $routes);

    if (empty($matchedUri)) {
        $matchedUri = regularExpressionMatchArrayRoutes($uri, $routes);

        $params = params($uri, $matchedUri);
        var_dump($params);
        die();
    }

    var_dump($matchedUri);
    die();
}