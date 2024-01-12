const body = document.body;
function openModal(modal) {
    modal.classList.add("modal__active");
    body.classList.add("hidden");
}

function closeModal(modal) {
    modal.classList.remove("modal__active");
    body.classList.remove("hidden");
}

function changeModal(closedModal, openedModal) {
    closedModal.classList.remove("modal__active");
    openedModal.classList.add("modal__active");
}


document.addEventListener("DOMContentLoaded", () => {
    const openButtons = document.querySelectorAll(".open-modal");
    const modals = document.querySelectorAll(".modal");
    const changeButtons = document.querySelectorAll(".change-modal");

    openButtons.forEach(openButton => {
        openButton.addEventListener("click", (e) => {
            e.preventDefault()
            const modal = document.querySelector(`.${openButton.dataset.modal}-modal`);
            openModal(modal);
        })
    })

    changeButtons.forEach(changeButton => {
        changeButton.addEventListener("click", (e) => {
            e.preventDefault()
            const closedModal = document.querySelector(`.${changeButton.dataset.closedmodal}-modal`);
            const openedModal = document.querySelector(`.${changeButton.dataset.openedmodal}-modal`);
            changeModal(closedModal, openedModal);
        })
    })

    modals.forEach((modal) => {
        modal.addEventListener("click", (e) => {
            e.preventDefault()
            if (e.target === modal || e.target.classList.contains("close")) {
                closeModal(modal);
            }
        });
    });
})