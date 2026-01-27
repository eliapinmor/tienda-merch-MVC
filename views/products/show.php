<?php require __DIR__ . '/../layout/header.php'; ?>
<div class="flex w-3/4 h-full min-h-96 max-w-6xl mx-auto justify-center gap-8 p-4 m-auto mt-8 flex-row">
    <!-- Carrusel -->
    <div class="max-w-xl w-1/2 mx-auto flex justify-center items-center">
        <div class="relative w-4/5 overflow-hidden rounded-lg shadow-xl shadow-black/30">

            <div id="carousel" class="flex transition-transform duration-500">
                <?php foreach ($images as $img): ?>
                    <img src="/<?= htmlspecialchars($img['image_path']) ?>" class="w-full flex-shrink-0 object-cover h-64">
                <?php endforeach; ?>
            </div>


            <button id="prev"
                class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-100 rounded-full p-2 shadow">
                &#8592;
            </button>
            <button id="next"
                class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-100 rounded-full p-2 shadow">
                &#8594;
            </button>
        </div>
    </div>

    <div class="w-1/2">
        <h2 class="text-4xl font-bold"><?= htmlspecialchars($product['product_name']) ?></h2>
        <p class="font-semibold"><?= htmlspecialchars($product['description']) ?></p>
        <p class="font-bold"><?= $product['price'] ?> €</p>
        <button class="btn">comprar</button>
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