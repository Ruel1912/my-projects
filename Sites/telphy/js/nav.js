
const anchors = document.querySelectorAll("nav a")
const header = document.querySelector('.header');
anchors.forEach((anchor) => {
    anchor.addEventListener("click", (e) => {
        e.preventDefault()
        const blockID = anchor.getAttribute("href")
        document.querySelector(blockID).scrollIntoView({
            behavior: "smooth",
            block: "start",
        })
    })
})
