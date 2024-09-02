const partnerButton = document.querySelector(".partners__button")
const partners = document.querySelectorAll(".partners__item")
partnerButton.addEventListener("click", () => {
    partners.forEach(partner => {
        partner.classList.toggle("show")
        partner.classList.contains("show")
            ? partnerButton.textContent = "Скрыть"
            : partnerButton.textContent = "Смотреть еще"
    })
})