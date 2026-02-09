<?php require_once __DIR__ . '/..//layout/header.php'; ?>
<div class="p-8">
    <h1 class="text-2xl font-bold">Consultar al Asistente de la Tienda</h1>
    <form method="POST" action="/rag/ask" class="mt-4">
        <textarea name="question" class="border p-2 w-full" placeholder="¿Qué estás buscando?"></textarea>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 mt-2 rounded">Consultar</button>
    </form>
</div>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>