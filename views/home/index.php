<?php $title = "Inicio"; ?>
<?php require __DIR__ . '/../layout/header.php'; ?>
<div
    class="bg-[url('/images/profile-vinil.jpg')] bg-cover bg-center min-h-screen flex flex-col justify-center items-center text-white">
    <div class="btn-glass p-24">
        <h1 class="text-4xl font-bold text-white">BIENVENIDO A LA TIENDA</h1>
        <div class="bg-red bg-opacity-50 p-6 rounded mt-4 text-center">
            <a href="/products" class="btn font-title text-4xl font-light bg-black px-6 py-4">ver productos</a>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>