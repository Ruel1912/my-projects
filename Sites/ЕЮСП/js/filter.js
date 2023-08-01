const titles = {
    civil: 'гражданскому',
    housing: 'жилищному',
    pension: 'пенсионному',
    family: 'семейному',
    labor: 'трудовому',
}


document.addEventListener("DOMContentLoaded", () => {
    window.scrollTo({
        top: 0,
        left: 0,
        behavior: 'smooth'
    });
    const hashValue = window.location.hash.slice(1);
    const filterBox = document.querySelector(".filter");
    const typeLaws = filterBox.querySelectorAll(".filter__item");
    const headerTypeLaws = document.querySelectorAll(".header .filter__item");
    const title = document.querySelector(".title span");
    const serviceItems = document.querySelectorAll(".service__item");
    const openFilterMenu = document.querySelector(".filter-mobile");
    const closeFilterMenu = document.querySelector(".close-filter");

    title.innerHTML = titles[hashValue];
    const law = Array.from(typeLaws).find(typeLaw => typeLaw.dataset.id === hashValue);
    law.classList.add("active");
    const serviceItem = Array.from(serviceItems).find(typeLaw => typeLaw.id === hashValue);
    serviceItem.classList.add("active");

    typeLaws.forEach((typeLaw, index) => {
        typeLaw.addEventListener("click", () => {
            title.innerHTML = titles[typeLaw.dataset.id];
            openFilterMenu.style.display !== "none" && filterBox.classList.remove("active");
            filter(typeLaw, index, serviceItems)
        })
    })

    headerTypeLaws.forEach((typeLaw, index) => {
        typeLaw.addEventListener("click", () => {
            title.innerHTML = titles[typeLaws[index].dataset.id];
            filter(typeLaws[index], index, serviceItems)
        })
    })

    openFilterMenu.addEventListener("click", () => filterBox.classList.add("active"));
    closeFilterMenu.addEventListener("click", () => filterBox.classList.remove("active"));
})

function filter(typeLaw, index, serviceItems) {
    const activeTypeLaw = document.querySelector(".filter__item.active");
    const activeserviceItem = document.querySelector(".service__item.active");
    activeTypeLaw.classList.remove("active");
    activeserviceItem.classList.remove("active");
    typeLaw.classList.add("active");
    serviceItems[index].classList.add("active");
}