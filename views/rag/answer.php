<?php require_once __DIR__ . '/../../layout/header.php'; ?>
<div class="p-8">
    <h2 class="font-bold">Tu pregunta:</h2>
    <p class="mb-4 text-gray-700"><?= htmlspecialchars($question) ?></p>

    <h2 class="font-bold text-green-700">Respuesta del sistema:</h2>
    <div class="bg-gray-100 p-4 rounded border">
        <?= nl2br(htmlspecialchars($answer)) ?>
    </div>
    
    <a href="/rag/ask" class="text-blue-500 underline mt-4 inline-block">Hacer otra pregunta</a>
</div>
<?php require_once __DIR__ . '/../../layout/footer.php'; ?>