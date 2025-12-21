<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Tienda MVC' ?></title>
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
</nav>

<hr>
