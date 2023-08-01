const openModals = document.querySelectorAll(".open-modal");
const modals = document.querySelectorAll(".modal");
const body = document.body;

// Close
function closeModal(modal) {
    modal.classList.remove('modal__active');
    body.classList.remove('hidden');
}

modals.forEach((modal) => {
    modal.addEventListener('click', (e) => {
        if (e.target === modal || e.target.classList.contains('close')) {
            closeModal(modal);
        }
    });
});

openModals.forEach((openModal) => {
    openModal.addEventListener('click', () => {
        body.classList.add('hidden');
        modals[0].classList.add('modal__active');
    });
});

