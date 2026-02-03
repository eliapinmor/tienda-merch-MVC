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

//PROFILE
if ($uri === '/profile') {
    require_once __DIR__ . '/../controllers/AuthController.php';
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: /login");
        exit;
    }
    require __DIR__ . '/../views/user/profile.php';
    exit;
}

//REGISTER
if ($uri === '/register') {
    require_once __DIR__ . '/../controllers/AuthController.php';
    $controller = new AuthController();
    $controller->register();
    exit;
}

// LOGIN
if ($uri === '/login') {
    require_once __DIR__ . '/../controllers/AuthController.php';
    $controller = new AuthController();
    $controller->login();
    exit;
}

// LOGOUT
if ($uri === '/logout') {
    require_once __DIR__ . '/../controllers/AuthController.php';
    $controller = new AuthController();
    $controller->logout();
    exit;
}

// admin dashboard
if ($uri === '/admin') {
    require_once __DIR__ . '/../controllers/AuthController.php';
    session_start();
    if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
        header("Location: /login");
        exit;
    }
    require __DIR__ . '/../views/admin/dashboard.php';
    exit;
}

if ($uri === '/admin/users') {
    session_start();
    if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
        header("Location: /login");
        exit;
    }
    // require __DIR__ . '/../views/admin/users.php';
    require_once __DIR__ . '/../controllers/UserController.php';
    $controller = new UserController();
    $controller->getAll();
    exit;
}

if ($uri === '/admin/users/saveUser' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
        header("Location: /login");
        exit;
    }

    require_once __DIR__ . '/../controllers/UserController.php';
    $controller = new UserController();
    $controller->saveUser();
    exit;
}

if ($uri === '/admin/users/delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
        header("Location: /login");
        exit;
    }

    require_once __DIR__ . '/../controllers/UserController.php';
    $controller = new UserController();
    $controller->deleteUser();
    exit;
}

if ($uri === '/admin/products') {
    session_start();
    if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
        header("Location: /login");
        exit;
    }
    require_once __DIR__ . '/../controllers/ProductController.php';
    $controller = new ProductController();
    $controller->getAll();
    exit;
}

if ($uri === '/admin/products/save' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
        header("Location: /login");
        exit;
    }

    require_once __DIR__ . '/../controllers/ProductController.php';
    $controller = new ProductController();
    $controller->saveProduct();
    exit;
}

if ($uri === '/admin/products/delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
        header("Location: /login");
        exit;
    }

    require_once __DIR__ . '/../controllers/ProductController.php';
    $controller = new ProductController();
    $controller->deleteProduct();
    exit;
}

if( $uri === '/admin/comments') {
    session_start();
    if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
        header("Location: /login");
        exit;
    }
    require __DIR__ . '/../views/admin/comments.php';
    exit;
}

//reviews

if (preg_match('#^/product/(\d+)/review$#', $uri, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../controllers/ReviewController.php';

    $controller = new ReviewsController();
    $controller->store($matches[1]);
    exit;
}

// 404
http_response_code(404);
echo "Página no encontrada";
