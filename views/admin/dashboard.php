<?php require __DIR__ . '/../layout/header.php'; ?>
<div class="flex flex-col md:flex-row justify-between items-center mb-6 px-4">
    <div>
        <h1 class="text-3xl md:text-4xl font-bold text-[#333] text-center md:text-left">Panel de Administración</h1>
    </div>
</div>
<div class="flex justify-center p-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 mt-4 md:mt-8 text-center">
        <a href="/admin/products"
            class="w-full md:w-64 min-h-48 bg-secondary rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-6 flex items-center justify-center text-center text-3xl font-bold text-white">
            PRODUCTOS</a>
        <a href="/admin/users"
            class="w-full md:w-64 min-h-48 bg-secondary rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-6 flex items-center justify-center text-center text-3xl font-bold text-white">
            USUARIOS</a>
        <a href="/admin/reviews"
            class="w-full md:w-64 min-h-48 bg-secondary rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-6 flex items-center justify-center text-center text-3xl font-bold text-white">
            COMENTARIOS</a> 
    </div>
</div>
<?php require __DIR__ . '/../layout/footer.php'; ?>