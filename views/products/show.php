<?php require __DIR__ . '/../layout/header.php'; ?>
<?php require __DIR__ . '/../layout/modal-login.php'; ?>
<div
    class="flex flex-col md:flex-row h-full min-h-96 max-w-6xl mx-auto justify-center gap-8 p-4 m-auto mt-10 md:mt-32 mb-20 md:mb-48">

    <div class="max-w-xl w-full md:w-3/5 mx-auto flex justify-center items-center">
        <div class="relative w-full md:w-4/5 overflow-hidden rounded-lg shadow-xl shadow-black/30">
            <?php if (empty($images)): ?>
                <img src="/images/no-image.jpg" class="w-full flex-shrink-0 object-cover h-64">
            <?php else: ?>
                <div id="carousel" class="flex transition-transform duration-500">
                    <?php foreach ($images as $img): ?>
                        <img src="/<?= htmlspecialchars($img['image_path']) ?>"
                            class="w-full flex-shrink-0 object-cover h-72 md:h-96"
                            alt="<?= htmlspecialchars($product['product_name']) ?>">
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

    <div class="w-full md:w-2/5 px-4 md:px-0">
        <h2 class="text-3xl md:text-4xl font-bold"><?= htmlspecialchars($product['product_name']) ?></h2>
        <p class="font-normal mt-4"><?= htmlspecialchars($product['description']) ?></p>
        <p class="font-bold text-2xl mt-4">
            <?= $product['price'] ?> €
        </p>

        <div class="flex items-center mt-8 gap-4">
            <form id="cart-form" method="POST" action="/cart/addProduct" class="flex flex-col sm:flex-row items-center gap-3 w-full">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">

                <div
                    class="flex items-center border-2 border-gray-200 rounded-xl overflow-hidden bg-white h-12 w-full sm:w-auto sm:min-w-[140px] flex-shrink-0 justify-between">
                    <button type="button" id="btn-minus"
                        class="px-4 py-2 hover:bg-gray-100 transition-colors text-gray-600 font-bold text-xl">-</button>

                    <input type="number" name="quantity" id="quantity-input" value="1" min="1" max="99" readonly
                        class="w-12 text-center font-bold text-gray-800 focus:outline-none bg-transparent">

                    <button type="button" id="btn-plus"
                        class="px-4 py-2 hover:bg-gray-100 transition-colors text-gray-600 font-bold text-xl">+</button>
                </div>

                <button type="submit"
                    class="w-full sm:flex-1 h-12 bg-primary text-white px-6 rounded-xl font-bold hover:bg-gray-800 transition-all active:scale-95 flex items-center justify-center gap-2">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Añadir</span>
                </button>
            </form>
        </div>
    </div>
</div>
<!-- te podría interesar -->
<h2 class="text-4xl font-bold text-[#333] text-center">TE PUEDE INTERESAR</h2>
<hr class="my-6 border-t-2 border-gray-300 w-96 m-auto">
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 p-8">
    <?php foreach ($relatedProducts as $related): ?>
        <div class="overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">
            <a href="/product/<?= $related['id'] ?>" class="flex-1 flex flex-col">

                <?php if (!empty($related['image_path'])): ?>
                    <img src="/<?= htmlspecialchars($related['image_path']) ?>"
                        alt="<?= htmlspecialchars($related['product_name']) ?>" class="w-full h-96 object-cover">
                <?php else: ?>
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                        <img src="/images/no-image.jpg" alt="No Image" class="w-24 h-24">
                    </div>
                <?php endif; ?>

                <div class="p-4 flex-1 flex flex-row justify-between">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2"><?= htmlspecialchars($related['product_name']) ?>
                    </h2>
                    <p class="font-bold text-xl"><?= number_format($related['price'], 2) ?> €</p>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>

<h2 class="text-3xl md:text-4xl font-bold text-[#333] text-center">OPINIONES</h2>
<hr class="my-6 border-t-2 border-gray-300 w-48 md:w-96 m-auto">

<div class="flex flex-col md:flex-row gap-4 p-4 md:p-8 m-auto">

    <div class="w-full md:w-1/3"> 
        <?php if (isset($_SESSION['user_id'])): ?>
            <form action="/reviews/create" method="POST" class="mt-4 space-y-4 m-auto">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">

                <label class="block mb-2 font-semibold">Puntuación</label>
                <div id="star-rating" class="flex gap-1 cursor-pointer">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <img src="/images/star.png" data-value="<?= $i ?>"
                            class="w-6 h-6 opacity-30 hover:opacity-100 transition">
                    <?php endfor; ?>
                </div>

                <input type="hidden" name="rating" id="rating-value" value="0">

                <textarea name="content" class="w-full border p-3 rounded min-h-24" placeholder="Escribe tu opinión..."
                    required></textarea>

                <button class="w-full md:w-auto px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Publicar review
                </button>
            </form>
        <?php else: ?>
            <p class="text-center text-gray-500 mt-4">
                Debes <a href="/login" class="text-blue-600 underline">iniciar sesión</a> para dejar una review.
            </p>
        <?php endif; ?>
    </div>

    <div class="flex flex-col justify-center w-full">
        <?php if (!empty($reviews)): ?>
            <?php foreach ($reviews as $review): ?>
                <div class="border-2 border-[#D4D4D4] rounded-lg m-auto mt-4 md:mt-8 p-4 w-full">
                    <div class="flex justify-between items-center mb-4 pb-2">
                        <div class="flex items-center gap-4">
                            <p class="font-semibold text-[#33333]">@<?= htmlspecialchars($review['username']) ?></p>
                        </div>
                        <div>
                            <?php 
                            $rating = (int)$review['rating'];
                            if ($rating > 0): 
                                for ($i = 1; $i <= $rating; $i++): ?>
                                    <img src="/images/star.png" alt="star" class="w-5 h-5 inline-block">
                                <?php endfor; 
                            else: ?>
                                <span class="text-xs text-gray-400 italic">Sin estrellas</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="text-sm">
                        <p><?= nl2br(htmlspecialchars($review['content'])) ?></p>
                    </div>
                    <div class="mt-2 text-right md:text-left">
                        <p class="text-[#ACACAC] text-xs font-semibold"><?= date("d/m/Y", strtotime($review['created_at'])) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center text-gray-500 mt-6">Aún no hay reseñas para este producto.</p>
        <?php endif; ?>
    </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // --- 1. REFERENCIAS AL DOM ---
        const carousel = document.getElementById('carousel');
        const stars = document.querySelectorAll("#star-rating img");
        const ratingValue = document.getElementById("rating-value");
        const cartForm = document.getElementById('cart-form');
        const loginModal = document.getElementById('login-modal');
        const btnMinus = document.getElementById('btn-minus');
        const btnPlus = document.getElementById('btn-plus');
        const quantityInput = document.getElementById('quantity-input');
        const isLoggedIn = <?= isset($_SESSION['user_id']) ? 'true' : 'false' ?>;

        // --- 2. LÓGICA DEL CARRUSEL ---
        if (carousel) {
            const images = carousel.children;
            const total = images.length;
            let index = 0;

            document.getElementById('next')?.addEventListener('click', () => {
                index = (index + 1) % total;
                carousel.style.transform = `translateX(-${index * 100}%)`;
            });

            document.getElementById('prev')?.addEventListener('click', () => {
                index = (index - 1 + total) % total;
                carousel.style.transform = `translateX(-${index * 100}%)`;
            });
        }

        // --- 3. LÓGICA DE ESTRELLAS ---
        if (stars.length > 0) {
            const updateStars = (val) => {
                stars.forEach(s => s.style.opacity = (s.dataset.value <= val) ? "1" : "0.3");
            };
            stars.forEach(star => {
                star.addEventListener("mouseover", () => updateStars(star.dataset.value));
                star.addEventListener("mouseout", () => updateStars(ratingValue.value));
                star.addEventListener("click", () => {
                    ratingValue.value = star.dataset.value;
                    updateStars(ratingValue.value);
                });
            });
        }

        // --- 4. LÓGICA DE CANTIDAD (+ / -) ---
        if (btnMinus && btnPlus && quantityInput) {
            btnMinus.addEventListener('click', () => {
                let val = parseInt(quantityInput.value);
                if (val > 1) quantityInput.value = val - 1;
            });
            btnPlus.addEventListener('click', () => {
                let val = parseInt(quantityInput.value);
                if (val < 99) quantityInput.value = val + 1;
            });
        }

        // --- 5. GESTIÓN DE ENVÍO Y MODAL ---
        if (cartForm) {
            cartForm.addEventListener('submit', (e) => {
                if (!isLoggedIn) {
                    e.preventDefault();
                    if (loginModal) loginModal.classList.remove('hidden');
                }
            });
        }

        // Cerrar modal al hacer clic en el fondo oscuro
        window.addEventListener('click', (e) => {
            if (e.target === loginModal) {
                loginModal.classList.add('hidden');
            }
        });
    });
</script>