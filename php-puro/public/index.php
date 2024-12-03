<?php

require '../vendor/autoload.php';

try {
    $data = router();

    extract($data['data']);

    if (!isset($data['view'])) {
        throw new Exception('O indice view está faltando');
    }

    if (!file_exists(VIEWS.$data['view'])) {
        throw new Exception("A view {$data['view']} não foi encontrada");
    }

    $view = $data['view'];

    require VIEWS.'master.php';
} catch (Exception $e) {
    var_dump($e->getMessage());
}
