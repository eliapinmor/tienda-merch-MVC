<?php

if (!isset($_SESSION['user_id'])) {
  header("Location: /login");
  exit;
}

require __DIR__ . '/../layout/header.php';
?>
<div class="flex justify-between items-center mb-6">
  <div>
    <h2>Bienvenido, <?= $_SESSION['user_username'] ?></h2>
  </div>
  <div>
    <a href="/logout" class="btn-glass">Cerrar sesión</a>
  </div>
</div>
<div>
  <!-- profile page -->
  <!-- profile pic -->
  <div>
    
  </div>
  <!-- profile data -->
  <div class="w-80 m-auto">
    <div>
      <p>Username: </p>
      <p class="input"><?= htmlspecialchars($_SESSION['user_username']) ?></p>
    </div>
    <div class="mt-4">
    <p>Email: </p>
    <p class="input"><?= htmlspecialchars($_SESSION['user_email']) ?></p>
  </div>
  </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>