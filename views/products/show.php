<?php require __DIR__ . '/../layout/header.php'; ?>

<h2><?= htmlspecialchars($product['product_name']) ?></h2>
<!-- <p><?= htmlspecialchars($product['description']) ?></p> -->
<p><strong><?= $product['price'] ?> €</strong></p>

<?php require __DIR__ . '/../layout/footer.php'; ?>
