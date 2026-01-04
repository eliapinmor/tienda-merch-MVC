<?php 

if (!isset($_SESSION['user_id'])) {
  header("Location: /login");
  exit;
}

require __DIR__ . '/../layout/header.php';
?>
<h2>Perfil del usuario</h2>
<p>Bienvenido, <?= $_SESSION['user_username'] ?></p>
<a href="/logout">Cerrar sesión</a>

<?php require __DIR__ . '/../layout/footer.php'; ?>