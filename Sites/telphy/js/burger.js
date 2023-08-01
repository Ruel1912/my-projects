const burger = document.querySelector(".burger");
const nav = document.querySelector(".header__nav");
const navCloses = document.querySelectorAll(".close-menu");

burger.addEventListener("click", () => {
    if (burger.classList.contains("burger__active")) {
        burger.classList.remove("burger__active");
        nav.classList.remove("nav__active");
    } else {
        burger.classList.add("burger__active");
        nav.classList.add("nav__active");
    }
});

navCloses.forEach(navClose => {
    navClose.addEventListener("click", () => {
        burger.classList.remove("burger__active");
        nav.classList.remove("nav__active");
    })
})
