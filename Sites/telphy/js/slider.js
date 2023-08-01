const mySwiper = new Swiper('.swiper-container', {
    direction: 'horizontal', // 'vertical', 'horizontal'
    loop: true, // true - круговой слайдер,
    spaceBetween: 32,
    slidesPerView: "auto",
    navigation: {
        nextEl: '.swiper-button-next',
    },
});
