<?php $title = "Reviews Management"; ?>
<?php require_once __DIR__ . '/../layout/header.php'; ?>
<h1 class="title-page">COMENTARIOS</h1>
<div class="flex gap-8">

    <div class="">
        <table class="w-full border-collapse">
            <thead class="table-head">
                <tr>
                    <th class="table-h  rounded-tl-xl"> id </th>
                    <th class="table-h"> autor </th>
                    <th class="table-h"> producto </th>
                    <th class="table-h"> precio </th>
                    <th class="table-h"> eliminar </th>
                    <th class="table-h rounded-tr-xl text-center"> acciones </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reviews as $review): ?>
                    <tr class="table-row">
                        <td class="table-d"><?= htmlspecialchars($review['id']) ?></td>
                        <td class="table-d"><?= htmlspecialchars($review['user_name']) ?></td>
                        <td class="table-d"><?= htmlspecialchars($review['product_name']) ?></td>
                        <td class="table-d"><?= htmlspecialchars($review['price']) ?></td>
                        <td class="table-d">
                            <?php if (!empty($review['image_path'])): ?>
                                <img src="/<?= htmlspecialchars($review['image_path']) ?>"
                                    alt="<?= htmlspecialchars($review['product_name']) ?>"
                                    class="w-10 h-10 object-cover rounded">
                            <?php endif; ?>
                        </td>
                        <td class="table-d space-x-2">
                            <form method="POST" action="/admin/reviews/delete" class="inline">
                                <input type="hidden" name="id" value="<?= $review['id'] ?>">
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