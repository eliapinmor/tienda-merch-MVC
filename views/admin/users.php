<?php $title = "User Management"; ?>
<?php require_once __DIR__ . '/../layout/header.php'; ?>
<h1>Users</h1>
<div class="flex">
  <div class="w-1/3">
    <!-- formulario -->
    <form method="POST" action="/admin/users/saveUser">
      <input type="hidden" name="id" value="">
      <div>
        <label>Username:</label>
        <input type="text" name="username" class="input" required
         value="<?= htmlspecialchars($editUser['username'] ?? '') ?>">
      </div>
      <div>
        <label>Email:</label>
        <input type="email" name="email" class="input" required
         value="<?= htmlspecialchars($editUser['email'] ?? '') ?>">
      </div>
      <div>
        <label>Password:</label>
        <input type="password" name="password" class="input" required>
      </div>
      <div>
        <label>Role:</label>
        <select name="role" class="input cursor-pointer">
          <option value="admin">Admin</option>
          <option value="customer">Customer</option>
        </select>
      </div>
      <button type="submit" class="btn">Save User</button>
    </form>
  </div>
  <div class="w-2/3">
    <table>
      <thead>
        <tr>
          <th class="table-h"> id </th>
          <th class="table-h"> username </th>
          <th class="table-h"> email </th>
          <th class="table-h"> rol </th>
          <th class="table-h"> acciones </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
          <tr class="hover:bg-gray-50 transition-colors">
            <td class="table-d"><?= htmlspecialchars($user['id']) ?></td>
            <td class="table-d"><?= htmlspecialchars($user['username']) ?>
            <td class="table-d"><?= htmlspecialchars($user['email']) ?></td>
            <td class="table-d space-x-2">
              <a href="/admin/users?edit=<?= $user['id'] ?>" class="text-blue-600">Editar</a>

              <form method="POST" action="/admin/users/delete" class="inline">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <button class="text-red-600">Eliminar</button>
              </form>
          </td>
        </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  </div>
  <?php require_once __DIR__ . '/../layout/footer.php'; ?>