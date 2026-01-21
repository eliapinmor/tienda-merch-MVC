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
    <link href="/css/tailwind.css" rel="stylesheet">
</head>

<body>

    <nav class="flex flex-row justify-evenly items-center p-4 bg-black text-white">
        <div>
            <a href="/products">PRODUCTOS</a>
        </div>
        <div>
            <a href="/" class="font-title text-7xl">URBAN MERCH</a>
        </div>
        <div>
            <?php if (!empty($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                <a href="/admin">ADMINSITRACIÓN</a>
            <?php else: ?>
                <a href="/profile">PERFIL</a>
            <?php endif; ?>
        </div>
    </nav>

    <hr>