<?php

require '../vendor/autoload.php';

try {
    $data = router();

    if (!isset($data['data'])) {
        throw new Exception('O indice data está faltando');
    }

    if (!isset($data['data']['title'])) {
        throw new Exception('O indice title está faltando');
    }

    if (!isset($data['view'])) {
        throw new Exception('O indice view está faltando');
    }

    if (!file_exists(VIEWS.$data['view'])) {
        throw new Exception("A view {$data['view']} não foi encontrada");
    }

    extract($data['data']);

    $view = $data['view'];

    require VIEWS.'master.php';
} catch (Exception $e) {
    var_dump($e->getMessage());
}
