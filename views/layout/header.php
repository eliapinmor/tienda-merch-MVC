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
    <link href="/css/tailwind.css" rel="stylesheet">
    <style>
        nav {
            padding: 10px;
            background: #222;
        }
        nav a {
            color: white;
            margin-right: 15px;
            text-decoration: none;
        }
    </style>
</head>
<body>

<nav>
    <a href="/">Home</a>
    <a href="/products">Productos</a>
<?php if (!empty($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
        <a href="/admin">Panel de Administración</a>
    <?php endif; ?>
    <a href="/profile">Perfil</a>
</nav>

<hr>
