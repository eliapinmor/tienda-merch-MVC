<?php $title = "Product Management"; ?>
<?php require_once __DIR__ . '/../layout/header.php'; ?>
<?php require_once __DIR__ . '/../layout/modal-delete.php'; ?>
<script src="/js/delete-modal.js" defer></script>
<h1 class="title-page">PRODUCTOS</h1>

<div class="flex flex-col md:flex-row gap-8">
    
    <div class="w-full md:w-1/3 md:sticky md:top-6 self-start">
        <form method="POST" action="/admin/products/save" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $editProduct['id'] ?? '' ?>">
            <div>
                <label>Nombre:</label>
                <input type="text" name="name" class="input"
                    value="<?= htmlspecialchars($editProduct['product_name'] ?? '') ?>" required>
            </div>
            <div>
                <label>Descripción:</label>
                <textarea type="text" name="description"
                    class="input max-h-64"><?= htmlspecialchars($editProduct['description'] ?? '') ?></textarea>
            </div>
            <div>
                <label>Precio:</label>
                <input type="number" name="price" class="input"
                    value="<?= htmlspecialchars($editProduct['price'] ?? '') ?>">
            </div>
            <div>
                <label>Imágenes del Producto:</label>
                <input type="file" name="images[]" id="imageInput" class="input" multiple accept="image/*">
                <small class="text-gray-500">Puedes seleccionar varias imágenes a la vez.</small>

                <div id="previewContainer"
                    class="flex flex-wrap gap-4 mt-4 p-4 border-2 border-dashed border-gray-300 rounded-lg">
                    <?php if (!empty($productImages)): ?>
                        <?php foreach ($productImages as $img): ?>
                            <div class="preview-item relative w-24 h-24 border rounded overflow-hidden shadow-sm">
                                <img src="/<?= htmlspecialchars($img['image_path']) ?>" class="w-full h-full object-cover">
                                <?php if ($img['is_main']): ?>
                                    <span class="absolute top-0 right-0 bg-primary text-white text-[10px] px-1 font-bold">Main</span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p id="placeholderText" class="text-gray-400 text-sm w-full text-center">No hay imágenes actuales</p>
                    <?php endif; ?>
                </div>
            </div>
            <button type="submit" class="btn">Save</button>
        </form>
    </div>

    <div class="w-full md:w-2/3">
        <div class="overflow-x-auto">
            <div class="max-h-[70vh] overflow-y-auto pr-2">
                <table class="w-full border-collapse">
                    <thead class="table-head">
                        <tr>
                            <th class="table-h rounded-tl-xl"> id </th>
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
                                    <a href="/admin/products?edit=<?= $product['id'] ?>"><i class="fa-solid fa-pen"></i></a>
                                    <button type="button" class="btn-delete text-red-600"
                                        data-id="<?= $product['id'] ?>" data-action="/admin/products/delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Tu script original intacto
    document.getElementById('imageInput').addEventListener('change', function (event) {
        const container = document.getElementById('previewContainer');
        const placeholder = document.getElementById('placeholderText');
        container.querySelectorAll('.preview-item').forEach(el => el.remove());
        const files = event.target.files;
        if (files.length > 0) {
            placeholder.style.display = 'none';
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const div = document.createElement('div');
                    div.className = 'preview-item relative w-24 h-24 border rounded overflow-hidden bg-gray-100';
                    div.innerHTML = `
                    <img src="${e.target.result}" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 bg-black bg-opacity-50 w-full text-[10px] text-white text-center py-1">
                        Nuevo
                    </div>`;
                    container.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
        } else {
            placeholder.style.display = 'block';
        }
    });
</script>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>