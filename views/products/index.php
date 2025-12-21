<?php $title = "Productos"; ?>
<?php require __DIR__ . '/../layout/header.php'; ?>

<h1>Productos</h1>

<ul>
<?php foreach ($products as $product): ?>
    <li>
        <a href="/product/<?= $product['id'] ?>">
            <?= htmlspecialchars($product['product_name']) ?>
        </a>
        - <?= number_format($product['price'], 2) ?> €
    </li>
<?php endforeach; ?>
</ul>

<?php require __DIR__ . '/../layout/footer.php'; ?>
