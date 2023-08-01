function scroll() {
    const header = document.querySelector(".header");
    if (scrollY >= 1) {
        header.classList.add("header__active");
    } else {
        header.classList.remove("header__active");
    }
}

scroll();

document.addEventListener("DOMContentLoaded", () => {
    const anchors = document.querySelectorAll(".header_bottom_navigation-lunk");
    const main = document.querySelector(".mainpage_main");
    const mainTitle = document.querySelector('.mainpage_main_left-title');
    const codeRowsInputs = document.querySelectorAll(".code__row input");
    const partnerSlider = new Swiper("#partner-slider", {
        direction: 'horizontal',
        spaceBetween: 10,
        slidesPerView: "auto",
        fade: 'true',
        grabCursor: 'true',
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });

    codeRowsInputs.forEach((codeRowsInput, index) => {
        codeRowsInput.addEventListener("input", () => {
            index !== codeRowsInputs.length - 1 && codeRowsInputs[index + 1].focus();
        })
    })

    setInterval(() => {
        main.classList.toggle('changeBg');
        main.classList.toggle('changeBg2');
        mainTitle.innerHTML = main.classList.contains("changeBg") ?
            "Честная и законная помощь в списании долгов под ключ <br> Рассрочка 0%" :
            "Банкротство через суд <br> в Липецкой, Тамбовской, Московской и других регионах";
    }, 10000);

    const completedSlider = new Swiper(".swiper-completed", {
        slidesPerView: 3,
        spaceBetween: 28,
        centerSlide: 'true',
        fade: 'true',
        grabCursor: 'true',
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            640: {
                slidesPerView: 2,
            },
            980: {
                slidesPerView: 3,
            },
        },
    });

    const teamSlider = new Swiper(".team-cards", {
        slidesPerView: 3,
        spaceBetween: 25,
        centerSlide: 'true',
        fade: 'true',
        grabCursor: 'true',
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            640: {
                slidesPerView: 2,
            },
            980: {
                slidesPerView: 3,
            },
        },
    });

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
})

document.addEventListener("scroll", scroll);
