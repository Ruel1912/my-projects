// scroll-nav
const header = document.querySelector(".header")

document.addEventListener("scroll", () => {
  if (pageYOffset >= 50) {
    header.classList.add("header__active")
  } else {
    header.classList.remove("header__active")
  }
})

// smooth-scroll

const anchors = document.querySelectorAll("nav a")

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
