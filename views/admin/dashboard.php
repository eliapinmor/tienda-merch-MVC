<?php require __DIR__ . '/../layout/header.php'; ?>
<h1>Panel de Administración</h1>
<p>Bienvenido al panel de administración.</p>
<div class="flex justify-end">
    <a href="/profile" class="btn-glass">IR A PERFIL</a>
</div>
<div class="flex flex-row justify-center gap-8 mt-8 text-center">
    <a href="/admin/products"
        class="w-64 min-h-48 bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-6 flex items-center justify-center text-center">
        PRODUCTOS</a>
    <a href="/admin/users"
        class="w-64 min-h-48 bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-6 flex items-center justify-center text-center">
        USUARIOS</a>
    <a href="/admin/comments"
        class="w-64 min-h-48 bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-6 flex items-center justify-center text-center">
        COMENTARIOS</a>
</div>
<?php require __DIR__ . '/../layout/footer.php'; ?>