</main>
<footer class="bg-gray-900 text-white p-4 mt-auto text-center">
    <p>Elia Pineda Moreno | Urban Merch 2026 ©</p>
</footer>
<script>
function showToast(message) {
    // type puede ser 'success' o 'error' (por defecto 'success')
    const type = arguments[1] || 'success';
    const colorBg = (type === 'error') ? 'bg-red-500' : 'bg-green-500';
    const borderColor = (type === 'error') ? 'border-red-700' : 'border-gray-700';

    const toast = document.createElement('div');
    toast.className = `fixed bottom-10 left-1/2 transform -translate-x-1/2 z-[10000] \
                       bg-gray-900 text-white px-6 py-3 rounded-full shadow-2xl \
                       flex items-center gap-3 border ${borderColor} toast-fade-in`;

    toast.innerHTML = `
        <div class="${colorBg} rounded-full p-1">
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <span class="font-medium text-sm">${message}</span>
    `;

    document.body.appendChild(toast);

    // Desaparecer a los 3.5 segundos
    setTimeout(() => {
        toast.classList.add('toast-fade-out');
        toast.addEventListener('animationend', () => toast.remove());
    }, 3500);
}
</script>

<style>
    .toast-fade-in { animation: toastIn 0.4s cubic-bezier(0.18, 0.89, 0.32, 1.28); }
    .toast-fade-out { animation: toastOut 0.3s ease-in forwards; }

    @keyframes toastIn {
        from { opacity: 0; transform: translate(-50%, 30px); }
        to { opacity: 1; transform: translate(-50%, 0); }
    }
    @keyframes toastOut {
        from { opacity: 1; transform: translate(-50%, 0); }
        to { opacity: 0; transform: translate(-50%, 20px); }
    }
</style>
<?php if (isset($_SESSION['toast_message'])): ?>
    <script>
        setTimeout(() => {
            if (typeof showToast === "function") {
                // Pasamos también el tipo (success|error), por defecto 'success'
                const msg = <?= json_encode($_SESSION['toast_message']) ?>;
                const type = <?= json_encode($_SESSION['toast_type'] ?? 'success') ?>;
                showToast(msg, type);
            } else {
                console.error("La función showToast no está definida.");
            }
        }, 100);
    </script>
    <?php unset($_SESSION['toast_message'], $_SESSION['toast_type']); ?>
<?php endif; ?>
</body>
</html>
