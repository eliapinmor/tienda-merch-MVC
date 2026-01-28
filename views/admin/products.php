<?php $title = "Product Management"; ?>
<?php require_once __DIR__ . '/../layout/header.php'; ?>
<h1 class="title-page">PRODUCTOS</h1>
<div class="flex gap-8">
    <div class="w-1/3">
        <form method="POST" action="/admin/products/save" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $editProduct['id'] ?? '' ?>">
            <div>
                <label>Nombre:</label>
                <input type="text" name="name" class="input"
                    value="<?= htmlspecialchars($editProduct['product_name'] ?? '') ?>" required>
            </div>
            <div>
                <label>Descripción:</label>
                <textarea type="text" name="description" class="input max-h-64"
                    value="<?= htmlspecialchars($editProduct['description'] ?? '') ?>"></textarea>
            </div>
            <div>
                <label>Precio:</label>
                <input type="number" name="price" class="input"
                    value="<?= htmlspecialchars($editProduct['price'] ?? '') ?>">
            </div>
            <div>
                <label>Imagen:</label>
                <input type="file" name="images[]" class="input"
                    value="<?= htmlspecialchars($editProduct['image'] ?? '') ?>" multiple accept="image/*">
                    <small class="text-gray-500">Max 5MB por imagen. Suba tantas imagenes como necesite.</small>
            </div>
            <button type="submit" class="btn">Save</button>
        </form>
    </div>
    <div class="w-2/3">
        <table class="w-full border-collapse">
            <thead class="table-head">
                <tr>
                    <th class="table-h  rounded-tl-xl"> id </th>
                    <th class="table-h"> name </th>
                    <th class="table-h"> description </th>
                    <th class="table-h"> precio </th>
                    <th class="table-h"> imagenes </th>
                    <th class="table-h rounded-tr-xl text-center"> acciones </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr class="table-row">
                        <td class="table-d"><?= htmlspecialchars($product['id']) ?></td>
                        <td class="table-d"><?= htmlspecialchars($product['product_name']) ?></td>
                        <td class="table-d"><?= htmlspecialchars($product['description']) ?></td>
                        <td class="table-d"><?= htmlspecialchars($product['price']) ?></td>
                        <td class="table-d">
                            <?php if (!empty($product['image_path'])): ?>
                                <img src="/<?= htmlspecialchars($product['image_path']) ?>"
                                    alt="<?= htmlspecialchars($product['product_name']) ?>"
                                    class="w-10 h-10 object-cover rounded">
                            <?php endif; ?>
                        </td>
                        <td class="table-d space-x-2">
                            <a href="/admin/products?edit=<?= $product['id'] ?>" class="text-blue-600">✏️</a>

                            <form method="POST" action="/admin/products/delete" class="inline">
                                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                <button class="text-red-600">🗑️</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>