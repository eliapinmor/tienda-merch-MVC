<?php require __DIR__ . '/../layout/header.php'; ?>
<div style="display: flex;">
    <div>
        <?php foreach ($images as $img): ?>
            <img src="/<?= $img['image_path'] ?>" width="220">
        <?php endforeach; ?>
    </div>
    <div>
        <h2><?= htmlspecialchars($product['product_name']) ?></h2>
        <p><?= htmlspecialchars($product['description']) ?></p>z
        <p><strong><?= $product['price'] ?> €</strong></p>
        <p>comprar</p>
    </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
