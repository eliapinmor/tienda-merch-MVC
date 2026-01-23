<?php $title = "User Management"; ?>
<?php require_once __DIR__ . '/../../layout/header.php'; ?>
<h1>Users</h1>
<div>
  <div>
    <!-- formulario -->
  </div>
  <div>
    <!-- lista de usuarios -->
     <?php foreach ($users as $user): ?>
        <div>
            <p><?= htmlspecialchars($user['username']) ?> (<?= htmlspecialchars($user['email']) ?>)</p>
        </div>
    <?php endforeach; ?>
  </div>
</div>
<?php require_once __DIR__ . '/../../layout/footer.php'; ?>