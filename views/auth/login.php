<?php
session_start();
if (isset($_SESSION['user_id'])) {
  header("Location: /profile");
  exit;
}

require __DIR__ . '/../layout/header.php';
?>
<h1 class="text-4xl font-bold text-center text-gray-800 mb-10">Iniciar sesión</h1>

<div
  class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col w-96 p-6">
  <form method="POST" action="/login">
    <div>
      <label>Email</label>
      <input type="email" name="email">
    </div>
    <div>
      <label>Contraseña</label>
      <input type="password" name="password">
    </div>
    <div>
      <button type="submit">Entrar</button>
    </div>

    <p>no tienes cuenta? <a href="/register">Regístrate aquí</a></p>
  </form>
</div>
<?php require __DIR__ . '/../layout/footer.php'; ?>
<?php if (isset($error))
  echo "<p style='color:red'>$error</p>"; ?>