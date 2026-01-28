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
<?php
    $isHome = ($_SERVER['REQUEST_URI'] === '/' || $_SERVER['REQUEST_URI'] === '');
?>

<body class="min-h-screen flex flex-col <?= $isHome ? '' : 'bg-gray-50' ?>" >

    <nav class="flex flex-row justify-evenly items-center p-4 bg-gray-900 text-white">
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

    <main class="flex-1 w-full <?= $isHome ? '' : 'max-w-7xl mx-auto p-6' ?>">