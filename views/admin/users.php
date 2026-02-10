<?php $title = "User Management"; ?>
<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h1 class="title-page">USUARIOS</h1>

<div class="flex flex-col md:flex-row gap-8 items-start px-4 md:px-0">
  
  <div class="w-full md:w-1/3 md:sticky md:top-6 self-start">
    <form method="POST" action="/admin/users/saveUser">
      <input type="hidden" name="id" value="<?= $editUser['id'] ?? '' ?>">
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
        <input type="password" name="password" class="input">
      </div>
      <div>
        <label>Role:</label>
        <select name="role" class="input cursor-pointer">
          <option value="customer" <?= (isset($editUser['role']) && $editUser['role'] === 'customer') ? 'selected' : '' ?>>Customer</option>
          <option value="admin" <?= (isset($editUser['role']) && $editUser['role'] === 'admin') ? 'selected' : '' ?>>Admin</option>
        </select>
      </div>
      <button type="submit" class="btn">Save User</button>
    </form>
  </div>

  <div class="w-full md:w-2/3">
    <div class="overflow-x-auto">
      <div class="max-h-[70vh] overflow-y-auto pr-2">
        <table class="w-full border-collapse">
          <thead class="table-head">
            <tr>
              <th class="table-h rounded-tl-xl">id</th>
              <th class="table-h">username</th>
              <th class="table-h">email</th>
              <th class="table-h">rol</th>
              <th class="table-h rounded-tr-xl">acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user): ?>
              <tr class="table-row">
                <td class="table-d"><?= htmlspecialchars($user['id']) ?></td>
                <td class="table-d"><?= htmlspecialchars($user['username']) ?></td>
                <td class="table-d"><?= htmlspecialchars($user['email']) ?></td>
                <td class="table-d"><?= htmlspecialchars($user['role']) ?></td>
                <td class="table-d space-x-2">
                  <a href="/admin/users?edit=<?= $user['id'] ?>"><i class="fa-solid fa-pen"></i></a>

                  <form method="POST" action="/admin/users/delete" class="inline">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <button class="text-red-600"><i class="fa-solid fa-trash"></i></button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>