const openModals = document.querySelectorAll(".open-modal")
const modals = document.querySelectorAll(".modal")
const body = document.body
const [login, register] = modals
const changeModalButton = document.querySelector(".change-modal")

document.addEventListener("DOMContentLoaded", () => {
  // Close
  function closeModal(modal) {
    modal.classList.remove('modal__active');
    body.classList.remove('hidden');
  }

  modals.forEach((modal) => {
    modal.addEventListener('click', (e) => {
      e.preventDefault();
      if (e.target === modal || e.target.classList.contains('close')) {
        closeModal(modal);
      }
    });
  });

  openModals.forEach((openModal) => {
    openModal.addEventListener('click', () => {
      body.classList.add('hidden');
      if (openModal.dataset.modal === 'login') {
        login.classList.add('modal__active');
      } else {
        register.classList.add('modal__active');
      }
    });
  });

  changeModalButton.addEventListener('click', () => {
    setTimeout(() => {
      body.classList.add('hidden');
      closeModal(login);
      register.classList.add('modal__active');
    });
  });
})
