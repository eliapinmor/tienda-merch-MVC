<?php require __DIR__ . '/../layout/header.php'; ?>
<h2>Registrarse</h2>

<form method="POST" action="/register">
    <label>Nombre de usuario</label>
    <input type="text" name="username">

    <label>Email</label>
    <input type="email" name="email">

    <label>Contraseña</label>
    <input type="password" name="password">

    <button type="submit">Crear cuenta</button>
</form>
<?php require __DIR__ . '/../layout/footer.php'; ?>
<?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
