const feedbackSwiper = new Swiper(".feedback__swiper", {
    direction: 'horizontal', // 'vertical', 'horizontal'
    loop: true, // true - круговой слайдер, false - слайдер с конечными положениями
    slidesPerView: 1, // кол-во активных слайдов
    centeredSlides: true, // центрирование слайдов
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    }
});

const articlesSwiper = new Swiper(".articles__swiper", {
    direction: 'horizontal', // 'vertical', 'horizontal'
    loop: true, // true - круговой слайдер, false - слайдер с конечными положениями
    slidesPerView: 1, // кол-во активных слайдов
    spaceBetween: 20,
    centeredSlides: true, // центрирование слайдов
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

const coachesSwiper = new Swiper(".coaches__swiper", {
    direction: 'horizontal', // 'vertical', 'horizontal'
    loop: true, // true - круговой слайдер, false - слайдер с конечными положениями
    autoHeight: true,
    slidesPerView: 1, // кол-во активных слайдов
    spaceBetween: 20,
    centeredSlides: true, // центрирование слайдов
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

const photoSwiper = new Swiper(".photo__swiper", {
    direction: 'horizontal', // 'vertical', 'horizontal'
    loop: true, // true - круговой слайдер, false - слайдер с конечными положениями
    slidesPerView: 1, // кол-во активных слайдов
    spaceBetween: 20,
    centeredSlides: true, // центрирование слайдов
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
})

const shopSwiper = new Swiper(".shop__nav-mobile", {
    direction: 'horizontal', // 'vertical', 'horizontal'
    loop: true, // true - круговой слайдер, false - слайдер с конечными положениями
    spaceBetween: 20,
    slidesPerView: "auto",
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
})