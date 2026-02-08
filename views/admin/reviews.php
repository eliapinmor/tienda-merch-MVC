<?php $title = "Reviews Management"; ?>
<?php require_once __DIR__ . '/../layout/header.php'; ?>
<h1 class="title-page">COMENTARIOS</h1>
<div class="flex gap-8">


        <table class="w-full border-collapse">
            <thead class="table-head">
                <tr>
                    <th class="table-h  rounded-tl-xl"> id </th>
                    <th class="table-h"> autor </th>
                    <th class="table-h"> producto </th>
                    <th class="table-h"> comentario </th>
                    <th class="table-h"> rating </th>
                    <th class="table-h"> fecha </th>
                    <th class="table-h rounded-tr-xl text-center"> eliminar </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reviews as $review): ?>
                    <tr class="table-row">
                        <td class="table-d"><?= htmlspecialchars($review['id']) ?></td>
                        <td class="table-d"><?= htmlspecialchars($review['username']) ?></td>
                        <td class="table-d"><?= htmlspecialchars($review['product_name']) ?></td>
                        <td class="table-d"><?= htmlspecialchars($review['content']) ?></td>
                        <td class="table-d text-center"><?= htmlspecialchars($review['rating']) ?></td>
                        <td class="table-d"><?= date("d/m/Y", strtotime($review['created_at'])) ?></td>
         
                        <td class="table-d text-center">
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
<?php require_once __DIR__ . '/../layout/footer.php'; ?>