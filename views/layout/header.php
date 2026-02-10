<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Tienda MVC' ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Freckle+Face&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="/css/tailwind.css" rel="stylesheet">
</head>
<?php
$isHome = ($_SERVER['REQUEST_URI'] === '/' || $_SERVER['REQUEST_URI'] === '');
?>

<body class="min-h-screen flex flex-col <?= $isHome ? '' : 'bg-gray-50' ?>">

    <nav
        class="flex flex-col md:flex-row justify-between md:justify-evenly items-center p-4 bg-gray-900 text-white gap-4 md:gap-0">
        <div class="order-2 md:order-1">
            <a href="/products" class="font-bold text-lg md:text-xl">PRODUCTOS</a>
        </div>

        <div class="order-1 md:order-2">
            <a href="/" class="font-title text-4xl md:text-7xl">URBAN MERCH</a>
        </div>

        <div class="flex gap-6 text-xl order-3">
            <div>
                <a href="/profile"><i class="fa-solid fa-user"></i></a>
            </div>
            <div>
                <a href="/cart"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
            <?php if (!empty($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                <div><a href="/admin"><i class="fa-solid fa-screwdriver-wrench"></i></a></div>
            <?php endif; ?>
        </div>
    </nav>

    <main class="flex-1 w-full <?= $isHome ? '' : 'max-w-7xl mx-auto p-4 md:p-6' ?>">