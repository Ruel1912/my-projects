const addresses = {
    'г. Санкт-Петербург': "г. Санкт-Петербург, наб. канала Грибоедова, д. 19",
    'г. Архангельск': "площадь Ленина, 4, Архангельск",
    'г. Северодвинск': "улица Ломоносова, 48, Северодвинск",
    'г. Новодвинск': "г. Новодвинск, ул. 50-Лет Октября, д. 26",
    'г. Котлас': "г. Котлас, ул. Карла Маркса, д. 7",
    'г. Колпино': "г. Колпино, ул. Пролетарская, д. 15",
}

// const sliderOptions = {
//     spaceBetween: 36,
//     navigation: {
//         nextEl: '.swiper-button-next',
//         prevEl: '.swiper-button-prev',
//     },
// };

// const slider1 = new Swiper('#slider1', sliderOptions);
// const slider2 = new Swiper('#slider2', sliderOptions);
// const slider3 = new Swiper('#slider3', sliderOptions);


document.addEventListener("DOMContentLoaded", () => {
    const filialsItem = Array.from(document.querySelectorAll(".filials__item"));
    const filialsContents = document.querySelectorAll(".filials__content");
    let activeFilial = filialsItem.find(filial => filial.classList.contains("active"));
    filialsContents[filialsItem.indexOf(activeFilial) - 1].classList.add("active");
    let address = addresses[activeFilial.textContent.trim()];
    const filialMap = document.querySelector("#filial__map");
    ymaps.ready(() => {
        initMap(address, 'filial__map');
    });

    filialsItem.forEach((filial, index) => {
        filial.addEventListener("click", () => {
            activeFilial = filialsItem.find(filial => filial.classList.contains("active"));
            if (activeFilial != filial) {
                activeFilial.classList.remove("active");
                filial.classList.add("active");
                filialsContents[filialsItem.indexOf(activeFilial) - 1].classList.remove("active");
                filialsContents[index - 1].classList.add("active");
                filialMap.innerHTML = "";
                address = addresses[filial.textContent.trim()];
                ymaps.ready(() => {
                    initMap(address, 'filial__map');
                });
            }
        })
    })
})