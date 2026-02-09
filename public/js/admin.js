document.addEventListener('DOMContentLoaded', () => {
    const deleteModal = document.getElementById('delete-modal');
    const deleteForm = document.getElementById('delete-form');
    const deleteInputId = document.getElementById('delete-id');
    const deleteButtons = document.querySelectorAll('.btn-delete');

    deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            const action = button.getAttribute('data-action');

            // 1. Configuramos el modal con los datos del botón pulsado
            deleteInputId.value = id;
            deleteForm.action = action;

            // 2. Mostramos el modal quitando la clase 'hidden'
            deleteModal.classList.remove('hidden');
        });
    });

    deleteModal.addEventListener('click', (e) => {
    if (e.target === deleteModal) {
        deleteModal.classList.add('hidden');
    }
});
});



