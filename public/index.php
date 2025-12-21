<?php

require_once __DIR__ . '/../controllers/ProductController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/public', '', $uri);


// HOME
if ($uri === '/' || $uri === '') {
    require __DIR__ . '/../views/home/index.php';
    exit;
}

// LISTADO DE PRODUCTOS
if ($uri === '/products') {
    $controller = new ProductController();
    $controller->index();
    exit;
}

// PRODUCTO POR ID
if (preg_match('#^/product/(\d+)$#', $uri, $matches)) {
    $controller = new ProductController();
    $controller->show($matches[1]);
    exit;
}

// 404
http_response_code(404);
echo "Página no encontrada";
