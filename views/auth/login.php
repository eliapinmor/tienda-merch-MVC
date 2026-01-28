<?php
session_start();
if (isset($_SESSION['user_id'])) {
  header("Location: /profile");
  exit;
}

require __DIR__ . '/../layout/header.php';
?>
<div class="flex w-full flex-row">
  <div class="basis-2/3">
    <img src="/images/login.avif" class="w-full" alt="login-image">
  </div>
  <div class="basis-1/3 m-auto">
    <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">Iniciar sesión</h1>
    <div class="flex items-center justify-center">
      <div>
        <form method="POST" action="/login">
          <div>
            <label>Email</label>
            <input type="email" name="email" class="w-full rounded-lg bg-white px-4 py-2 text-gray-800
            ring-1 ring-gray-300
            focus:ring-2 focus:ring-blue-600 focus:outline-none">
          </div>
          <div>
            <label>Contraseña</label>
            <input type="password" name="password" class="w-full rounded-md bg-white px-4 py-2 text-gray-800
            ring-1 ring-gray-300
            focus:ring-2 focus:ring-blue-500 focus:outline-none">
          </div>
          <div>
            <button type="submit" class="btn">Entrar</button>
          </div>
          <?php if (isset($error))
  echo "<p style='color:red'>$error</p>"; ?>

          <div class="mt-8">
            <p>¿No tienes cuenta? <strong><a href="/register">Regístrate aquí</a></strong></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
