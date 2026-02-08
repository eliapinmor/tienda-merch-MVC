<?php $title = "Productos | Urban Merch"; ?>
<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="min-h-screen bg-gray-50 py-10 px-4">
    <!-- <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">Productos</h1> -->

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <?php foreach ($products as $product): ?>
            <div class="overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">
                <a href="/product/<?= $product['id'] ?>" class="flex-1 flex flex-col">
                    
                    <?php if (!empty($product['image_path'])): ?>
                        <img src="<?= htmlspecialchars($product['image_path']) ?>" alt="<?= htmlspecialchars($product['product_name']) ?>" class="w-full h-80 object-cover">
                    <?php else: ?>
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                            <img src="/images/no-image.jpg" alt="No Image" class="w-24 h-24">
                        </div>
                    <?php endif; ?>

                    <div class="p-4 flex-1 flex flex-row justify-between">
                        <h2 class="text-lg font-semibold text-gray-800 mb-2"><?= htmlspecialchars($product['product_name']) ?></h2>
                        <p class="font-bold text-xl"><?= number_format($product['price'], 2) ?> €</p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
