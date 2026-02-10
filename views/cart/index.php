<?php $title = "Carrito de Compras"; ?>
<?php require __DIR__ . '/../layout/header.php'; ?>
<?php require_once __DIR__ . '/../layout/modal-delete.php'; ?>
<script src="/js/delete-modal.js" defer></script>
<h1 class="text-4xl font-bold text-center text-gray-800 mb-10">Carrito de Compras</h1>
<?php if (!isset($_SESSION['user_id'])): ?>
    <p class="text-center text-gray-600">Debes iniciar sesión para ver tu carrito.</p>
<?php else: ?>
    <?php if (empty($cartItems)): ?>
        <p class="text-center text-gray-600">Tu carrito está vacío.</p>
    <?php else: ?>
        <div class="flex gap-8">
            <div class="w-3/5">
                <table class="w-full table-auto">
                    <tbody class="text-gray-600 text-sm font-light">
                        <?php foreach ($cartItems as $item): ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left flex items-center">
                                    <?php if (!empty($item['image_path'])): ?>
                                        <img src="<?= htmlspecialchars($item['image_path']) ?>"
                                            alt="<?= htmlspecialchars($item['product_name']) ?>" class="w-16 h-16 object-cover mr-4">
                                    <?php else: ?>
                                        <div class="w-16 h-16 bg-gray-200 flex items-center justify-center text-gray-500 mr-4">
                                            <img src="/images/no-image.jpg" alt="No Image" class="w-8 h-8">
                                        </div>
                                    <?php endif; ?>
                                    <?= htmlspecialchars($item['product_name']) ?>
                                </td>
                                <td class="table-d"><?= number_format($item['price'], 2) ?> €</td>
                                <td class="table-d"><?= $item['quantity'] ?></td>
                                <td class="table-d"><?= number_format($item['price'] * $item['quantity'], 2) ?> €</td>
                                <td class="table-d">
                                    <!-- <form method="POST" action="/cart/delete" class="inline">
                                        <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                        <button class="text-red-600 hover:text-red-800 transition"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form> -->
                                    <button type="button" class="btn-delete text-red-600" data-id="<?= $item['id'] ?>"
                                        data-action="/cart/delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="w-2/5">
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4">Resumen del Pedido</h2>
                    <p class="text-gray-600 mb-4">Total: <?= number_format($total, 2) ?> €</p>
                    <a href="/checkout" class="btn w-full text-center">Proceder al Pago</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>


<?php require __DIR__ . '/../layout/footer.php'; ?>