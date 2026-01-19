<?php require __DIR__ . '/../layout/header.php'; ?>
<div class="flex w-94 bg-red-500 justify-center p-4 m-auto flex-row gap-8">
    <div>
        <?php foreach ($images as $img): ?>
            <img src="/<?= $img['image_path'] ?>" width="220">
        <?php endforeach; ?>
    </div>
    <div>
        <h2><?= htmlspecialchars($product['product_name']) ?></h2>
        <p><?= htmlspecialchars($product['description']) ?></p>
        <p><strong><?= $product['price'] ?> €</strong></p>
        <p>comprar</p>
    </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
