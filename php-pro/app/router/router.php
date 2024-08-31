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
//trabalhando com as duas funçoes juntas
function router() {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //capturando a uri
    $routes = routes();
    //verificando se a rota existe
    $matchedUri = exactMatchUriInArrayRoutes($uri, $routes);

    if (empty($matchedUri)) {
        $matchedUri = regularExpressionMatchArrayRoutes($uri, $routes);
    }

    var_dump($matchedUri);
    die();
}