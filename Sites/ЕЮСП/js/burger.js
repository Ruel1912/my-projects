const burger = document.querySelector(".burger");
const nav = document.querySelector(".header .header__list");
const navCloses = document.querySelectorAll(".close-menu");

burger.addEventListener("click", () => {
    if (burger.classList.contains("active")) {
        burger.classList.remove("active");
        nav.classList.remove("nav__active");
    } else {
        burger.classList.add("active");
        nav.classList.add("nav__active");
    }
});


navCloses.forEach(navClose => {
    navClose.addEventListener("click", () => {
        burger.classList.remove("active");
        nav.classList.remove("nav__active");
    })
})
