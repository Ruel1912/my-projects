const advantage = document.querySelector(".advantage")
window.addEventListener("scroll", () => {
    if (!advantage.classList.contains("active") && document.documentElement.scrollTop > (advantage.offsetTop - 400)) {
        advantage.classList.add("active")
    }
}) 