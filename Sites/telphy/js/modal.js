const openButtons = document.querySelectorAll(".open-modal");
const body = document.body;

openButtons.forEach(openButton => {
    openButton.addEventListener("click", () => {
        const modal = document.querySelector(`.${openButton.dataset.modal}-modal`);
        modal.classList.add("modal__active");
        !openButton.classList.contains("close-modal") && body.classList.add("hidden");
    })
})

modals.forEach((modal) => {
    modal.addEventListener("click", (e) => {
        if (e.target === modal || e.target.classList.contains("close-modal")) {
            modal.classList.remove('modal__active');
            !e.target.classList.contains("open-modal") && body.classList.remove("hidden");
        }
    });
});