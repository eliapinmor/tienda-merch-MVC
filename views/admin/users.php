<?php $title = "User Management"; ?>
<?php require_once __DIR__ . '/../layout/header.php'; ?>
<h1>Users</h1>
<div class="flex">
  <div>
    <!-- formulario -->
    <form method="POST" action="/admin/users/saveUser">
      <input type="hidden" name="id" value="">
      <div>
        <label>Username:</label>
        <input type="text" name="username" class="w-full rounded-lg bg-white px-4 py-2 text-gray-800
         ring-1 ring-gray-300
         focus:ring-2 focus:ring-blue-600 focus:outline-none" required
         value="<?= htmlspecialchars($editUser['username'] ?? '') ?>">
      </div>
      <div>
        <label>Email:</label>
        <input type="email" name="email" class="w-full rounded-lg bg-white px-4 py-2 text-gray-800
         ring-1 ring-gray-300
         focus:ring-2 focus:ring-blue-600 focus:outline-none" required
         value="<?= htmlspecialchars($editUser['email'] ?? '') ?>">
      </div>
      <div>
        <label>Password:</label>
        <input type="password" name="password" class="w-full rounded-lg bg-white px-4 py-2 text-gray-800
         ring-1 ring-gray-300
         focus:ring-2 focus:ring-blue-600 focus:outline-none" required>
      </div>
      <div>
        <label>Role:</label>
        <select name="role">
          <option value="admin">Admin</option>
          <option value="customer">Customer</option>
        </select>
      </div>
      <button type="submit">Save User</button>
    </form>
  </div>
  <div>
    <!-- lista de usuarios -->
    <?php foreach ($users as $user): ?>
      <div>
        <p><?= htmlspecialchars($user['username']) ?> (<?= htmlspecialchars($user['email']) ?>)</p>
        <div class="space-x-2">
          <a href="/admin/users?edit=<?= $user['id'] ?>" class="text-blue-600">Editar</a>

          <form method="POST" action="/admin/users/delete" class="inline">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <button class="text-red-600">Eliminar</button>
          </form>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <?php require_once __DIR__ . '/../layout/footer.php'; ?>