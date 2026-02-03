<?php require __DIR__ . '/../layout/header.php'; ?>
<div class="flex w-3/4 h-full min-h-96 max-w-6xl mx-auto justify-center gap-8 p-4 m-auto mt-8 flex-row">
    <!-- Carrusel -->
    <div class="max-w-xl w-1/2 mx-auto flex justify-center items-center">
        <div class="relative w-4/5 overflow-hidden rounded-lg shadow-xl shadow-black/30">
                <?php if (empty($images)): ?>
                    <img src="/images/no-image.jpg" class="w-full flex-shrink-0 object-cover h-64">
                    <?php else: ?>

            <div id="carousel" class="flex transition-transform duration-500">
                <?php foreach ($images as $img): ?>
                    <img src="/<?= htmlspecialchars($img['image_path']) ?>" class="w-full flex-shrink-0 object-cover h-64" alt="<?= htmlspecialchars($product['product_name']) ?>">
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
            <?php endif; ?>
        </div>
    </div>

    <div class="w-1/2">
        <h2 class="text-4xl font-bold"><?= htmlspecialchars($product['product_name']) ?></h2>
        <p class="font-normal mt-"><?= htmlspecialchars($product['description']) ?></p>
        <div class="flex items-center mt-8 gap-4">
            <div class="w-1/2 text-3xl">
                <p class="font-bold">
                    <?= $product['price'] ?> €
                </p>
            </div>
            <div class="btn w-1/2 mt-auto text-center">
                <button>comprar</button>
            </div>
        </div>

    </div>
</div>
<hr class="my-6 border-t-2 border-gray-300 w-96 m-auto">
<div>
    <h1 class="text-4xl font-bold text-[#333] text-center">OPINIONES</h1>
    <h3 class="text-xl font-bold mt-10">Añadir review</h3>

<?php if (isset($_SESSION['user_id'])): ?>
<form action="/reviews/create" method="POST" class="mt-4 space-y-4 w-3/5 m-auto">

    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">

    <!-- Rating -->
    <label class="block">
        <span class="block mb-1 font-semibold">Puntuación (1-5)</span>
        <select name="rating" class="border p-2 rounded w-24" required>
            <option value="1">1 ⭐</option>
            <option value="2">2 ⭐</option>
            <option value="3">3 ⭐</option>
            <option value="4">4 ⭐</option>
            <option value="5">5 ⭐</option>
        </select>
    </label>

    <!-- Content -->
    <textarea 
        name="content"
        class="w-full border p-3 rounded"
        placeholder="Escribe tu opinión..."
        required
    ></textarea>

    <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        Publicar review
    </button>
</form>

<?php else: ?>
    <p class="text-center text-gray-500 mt-4">
        Debes <a href="/login" class="text-blue-600 underline">iniciar sesión</a> para dejar una review.
    </p>
<?php endif; ?>

    <div class="flex flex-col justify-center">
        <?php if (!empty($reviews)): ?>
    <?php foreach ($reviews as $review): ?>
        <div class="border-2 border-[#D4D4D4] rounded-lg w-3/5 m-auto mt-8 p-4">
            
            <!-- header review -->
            <div class="flex justify-between items-center mb-4 pb-2">
                <div class="p4 flex items-center gap-4">
                    <img src="/images/profile.png" 
                         alt="Profile Picture" 
                         class="w-10 h-10 rounded-full">

                    <p><?= htmlspecialchars($review->username) ?></p>
                </div>

                <div>
                    <p><?= date("d/m/Y", strtotime($review->created_at)) ?></p>
                </div>
            </div>

            <!-- contenido review -->
            <div class="text-sm">
                <p><?= nl2br(htmlspecialchars($review->content)) ?></p>
            </div>

        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-center text-gray-500 mt-6">Aún no hay reseñas para este producto.</p>
<?php endif; ?>


        <!-- <div class="border-2 border-[#ACACAC] rounded-lg w-3/5 m-auto mt-8 p-4"> -->
            <!-- header review -->
            <!-- <div class="flex justify-between items-center mb-4 pb-2">
                <div class="p4 flex items-center gap-4">
                    <img src="/images/profile.png" alt="Profile Picture" class="w-10 h-10 rounded-full">
                    <?php if (isset($_SESSION['user_username'])): ?>
                        <p><?= $_SESSION['user_username'] ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <p>17/02/2025</p>
                </div>
            </div> -->
            <!-- contenido review -->
            <!-- <div class="text-sm">
                <p>El producto es de muy buena calidad y el envío fue rápido. Recomendado.</p>
            </div>
        </div> -->
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