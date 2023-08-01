const autoplaySlider = new Swiper('#autoplay-slider', {
    direction: 'horizontal',
    slidesPerView: 1,
    loop: true,
    centeredSlides: true,
    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
    },
});

const resultSlider = new Swiper('#result', {
    spaceBetween: 30,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
        renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + '</span>';
        },
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        1200: {
            slidesPerView: 2,
            slidesPerGroup: 2,
        },
        320: {
            slidesPerView: 1,
            slidesPerGroup: 1,
        }
    }
});

const feedbackSlider = new Swiper('#feedback', {
    slidesPerView: 1,
    spaceBetween: 15,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
        renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + '</span>';
        },
    },
    breakpoints: {
        640: {
            slidesPerView: 2,
        }
    }
});

const expertSlider = new Swiper('#expert', {
    loop: true,
    spaceBetween: 40,
    navigation: {
        nextEl: '.swiper-button-next',
    },
    breakpoints: {
        900: {
            slidesPerView: 3,
        },
        640: {
            slidesPerView: 2,
        },
        320: {
            slidesPerView: 1,
        }
    }
});

const judSlider = new Swiper('#jud', {
    loop: true,
    spaceBetween: 40,
    navigation: {
        nextEl: '.swiper-button-next',
    },
    breakpoints: {
        900: {
            slidesPerView: 3,
        },
        640: {
            slidesPerView: 2,
        },
        320: {
            slidesPerView: 1,
        }
    }
});

const partnerSlider = new Swiper('#partner', {
    loop: true,
    spaceBetween: 40,
    navigation: {
        nextEl: '.swiper-button-next',
    },
    breakpoints: {
        900: {
            slidesPerView: 3,
        },
        640: {
            slidesPerView: 2,
        },
        320: {
            slidesPerView: 1,
        }
    }
});

const contactProp = {
    slidesPerView: "auto",
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        640: {
            spaceBetween: 36,
        },
        320: {
            spaceBetween: 10,
        }
    }
}

const contact1Slider = new Swiper('#contact1', contactProp);
const contact2Slider = new Swiper('#contact2', contactProp);
const contact3Slider = new Swiper('#contact3', contactProp);

function handleResize(cards) {
    let maxHeight = 0;
    cards.forEach((card) => {
        card.style.height = "auto";
        if (card.clientHeight > maxHeight) {
            maxHeight = card.clientHeight;
        }
    });
    cards.forEach(card => card.style.setProperty('height', maxHeight, 'important'))
}

window.addEventListener('resize', () => {
    handleResize(document.querySelectorAll('.feedback__item'));
    handleResize(document.querySelectorAll('.expert__item'));
    handleResize(document.querySelectorAll('.jud__item'));
    handleResize(document.querySelectorAll('.partner__item'));
});

window.addEventListener('load', () => {
    handleResize(document.querySelectorAll('.feedback__item'));
    handleResize(document.querySelectorAll('.expert__item'));
    handleResize(document.querySelectorAll('.jud__item'));
    handleResize(document.querySelectorAll('.partner__item'));
});