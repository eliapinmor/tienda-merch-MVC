<?php
session_start();
if (isset($_SESSION['user_id'])) {
  header("Location: /profile");
  exit;
}

require __DIR__ . '/../layout/header.php';
?>
<h2>Iniciar sesión</h2>

<form method="POST" action="/login">
    <label>Email</label>
    <input type="email" name="email">

    <label>Contraseña</label>
    <input type="password" name="password">

    <button type="submit">Entrar</button>

    <p>no tienes cuenta? <a href="/register">Regístrate aquí</a></p>
</form>
<?php require __DIR__ . '/../layout/footer.php'; ?>
<?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
