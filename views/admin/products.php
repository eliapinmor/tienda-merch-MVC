<?php $title = "Product Management"; ?>
<?php require_once __DIR__ . '/../layout/header.php'; ?>
<h1>PRODUCTOS</h1>
<div class="flex">
    <div>
        <form method="POST" action="/admin/products/save" enctype="multipart/form-data">
            <input type="hidden" name="id" value="">
            <div>
                <label>Nombre:</label>
                <input type="text" name="name" class="input" value="<?= htmlspecialchars($editProduct['product_name'] ?? '') ?>"
                    required>
            </div>
            <div>
                <label>Descripción:</label>
                <input type="text" name="description" class="input"
                    value="<?= htmlspecialchars($editProduct['description'] ?? '') ?>">
            </div>
            <div>
                <label>Precio:</label>
                <input type="number" name="price" class="input"
                    value="<?= htmlspecialchars($editProduct['price'] ?? '') ?>"></div>
                    <div>
                        <label>Imagen:</label>
                        <input type="file" name="images[]" class="input"
                            value="<?= htmlspecialchars($editProduct['image'] ?? '') ?>" multiple accept="image/*">
                    </div>
            <button type="submit" class="btn">Save</button>
        </form>
    </div>
    <div>
        <?php foreach ($products as $product): ?>
            <div>
                <p><?= htmlspecialchars($product['product_name']) ?> - $<?= htmlspecialchars($product['price']) ?></p>
                <div class="space-x-2">
                    <a href="/admin/products?edit=<?= $product['id'] ?>" class="text-blue-600">Editar</a>

                    <form method="POST" action="/admin/products/delete" class="inline">
                        <input type="hidden" name="id" value="<?= $product['id'] ?>">
                        <button class="text-red-600">Eliminar</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>