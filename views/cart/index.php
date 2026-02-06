<?php $title = "Carrito de Compras"; ?>
<?php require __DIR__ . '/../layout/header.php'; ?>


    <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">Carrito de Compras</h1>

<?php if (empty($cartItems)): ?>
    <p class="text-center text-gray-600">Tu carrito está vacío.</p>
<?php else: ?>
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Producto</th>
                    <th class="py-3 px-6 text-left">Precio</th>
                    <th class="py-3 px-6 text-left">Cantidad</th>
                    <th class="py-3 px-6 text-left">Total</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <?php foreach ($cartItems as $item): ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left flex items-center">
                            <?php if (!empty($item['image_path'])): ?>
                                <img src="<?= htmlspecialchars($item['image_path']) ?>" alt="<?= htmlspecialchars($item['product_name']) ?>" class="w-16 h-16 object-cover mr-4">
                            <?php else: ?>
                                <div class="w-16 h-16 bg-gray-200 flex items-center justify-center text-gray-500 mr-4">
                                    <img src="/images/no-image.jpg" alt="No Image" class="w-8 h-8">
                                </div>
                            <?php endif; ?>
                            <?= htmlspecialchars($item['product_name']) ?>
                        </td>
                        <td class="py-3 px-6 text-left"><?= number_format($item['price'], 2) ?> €</td>
                        <td class="py-3 px-6 text-left"><?= $item['quantity'] ?></td>
                        <td class="py-3 px-6 text-left"><?= number_format($item['price'] * $item['quantity'], 2) ?> €</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

<?php endif; ?>


<?php require __DIR__ . '/../layout/footer.php'; ?>