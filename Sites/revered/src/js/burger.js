const burger = document.querySelector(".burger")
const navMobile = document.querySelector(".nav__mobile")

burger.addEventListener("click", () => {
  if (burger.classList.contains("burger__active")) {
    burger.classList.remove("burger__active")
    navMobile.classList.remove("nav__mobile__active")
  } else {
    burger.classList.add("burger__active")
    navMobile.classList.add("nav__mobile__active")
  }
})
