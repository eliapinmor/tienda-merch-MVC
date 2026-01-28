<?php require __DIR__ . '/../layout/header.php'; ?>
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-4xl font-bold text-[#333]">Panel de Administración</h1>
    </div>
    <div>
        <a href="/profile" class="btn-glass">IR A PERFIL</a>
    </div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8 mt-8 text-center">
    <a href="/admin/products"
        class="w-64 min-h-48 bg-secondary rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-6 flex items-center justify-center text-center text-3xl font-bold text-white">
        PRODUCTOS</a>
    <a href="/admin/users"
        class="w-64 min-h-48 bg-secondary rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-6 flex items-center justify-center text-center text-3xl font-bold text-white">
        USUARIOS</a>
    <a href="/admin/comments"
        class="w-64 min-h-48 bg-secondary rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-6 flex items-center justify-center text-center text-3xl font-bold text-white">
        COMENTARIOS</a>
</div>
<?php require __DIR__ . '/../layout/footer.php'; ?>