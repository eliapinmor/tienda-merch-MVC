<?php require __DIR__ . '/../layout/header.php'; ?>
<div class="flex w-full max-w-6xl mx-auto bg-red-500 justify-center gap-40 p-4 m-auto flex-row">
    <!-- <div>
        <?php foreach ($images as $img): ?>
            <img src="/<?= $img['image_path'] ?>" width="220">
        <?php endforeach; ?>
    </div> -->
    <!-- Carrusel -->
     <div class="max-w-xl mx-auto mt-6">
    <div class="relative w-full overflow-hidden rounded-lg shadow-lg">

        <div id="carousel" class="flex transition-transform duration-500">
            <?php foreach ($images as $img): ?>
                <img src="/<?= htmlspecialchars($img['image_path']) ?>"
                     class="w-full flex-shrink-0 object-cover h-64">
            <?php endforeach; ?>
        </div>


        <button id="prev" class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-100 rounded-full p-2 shadow">
            &#8592;
        </button>
        <button id="next" class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-100 rounded-full p-2 shadow">
            &#8594;
        </button>
    </div>
</div>

    <div>
        <h2><?= htmlspecialchars($product['product_name']) ?></h2>
        <p><?= htmlspecialchars($product['description']) ?></p>
        <p><strong><?= $product['price'] ?> €</strong></p>
        <p>comprar</p>
    </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const carousel = document.getElementById('carousel');
    if (!carousel) return; // seguridad extra

    const images = carousel.children;
    const total = images.length;
    let index = 0;

    document.getElementById('next').addEventListener('click', () => {
        index = (index + 1) % total;
        updateCarousel();
    });

    document.getElementById('prev').addEventListener('click', () => {
        index = (index - 1 + total) % total;
        updateCarousel();
    });

    function updateCarousel() {
        carousel.style.transform = `translateX(-${index * 100}%)`;
    }

});
</script>
