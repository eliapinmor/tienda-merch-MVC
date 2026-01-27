const carousel = document.getElementById('carousel');
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
    const offset = -index * 100; // mover en porcentaje
    carousel.style.transform = `translateX(${offset}%)`;
}
