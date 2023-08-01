const burger = document.querySelector('.burger')
const mobile__list = document.querySelector(".header__list")
const anchors = document.querySelectorAll(".header__main__list a")
const checkboxes = document.querySelectorAll('.custom-checkbox input[type="checkbox"]');
const accordions = document.querySelectorAll(".accordion")

document.addEventListener("DOMContentLoaded", () => {
    // Masked on telephone
    $(".phone").mask("+7 (999) 999-99-99")

    $.fn.setCursorPosition = function (pos) {
        if ($(this).get(0).setSelectionRange) {
            $(this).get(0).setSelectionRange(pos, pos)
        } else if ($(this).get(0).createTextRange) {
            var range = $(this).get(0).createTextRange()
            range.collapse(true)
            range.moveEnd("character", pos)
            range.moveStart("character", pos)
            range.select()
        }
    }

    $('input[type="tel"]').click(function () {
        $(this).setCursorPosition(4) // set position number
    })
})

function setTotal(total) {
    total.innerHTML = 0;
    const trashRows = document.querySelectorAll(".trash__row");
    trashRows.forEach(trashRow => {
        const priceContainer = trashRow.querySelector(".card__control");
        let price = priceContainer.classList.contains("sale")
            ? priceContainer.querySelector(".card__new-price")
            : priceContainer.querySelector(".card__price")
        if (trashRow.classList.contains("active")) {
            total.innerHTML = parseInt(total.innerHTML) + parseInt(price.innerHTML);
        }
    })
}




// Burger
burger.addEventListener('click', () => {
    if (burger.classList.contains("active")) {
        burger.classList.remove('active')
        mobile__list.classList.remove('active')
    } else {
        burger.classList.add('active')
        mobile__list.classList.add('active')
    }
})

// Accordion
accordions.forEach((accordion) => {
    accordion.addEventListener('click', () => {
        const content = accordion.querySelector(".accordion__content");
        // Закрываем текущий блок, если он уже открыт
        if (content.classList.contains('active')) {
            content.classList.remove('active');
            accordion.classList.remove('active');
            return;
        }

        // Закрываем все блоки, кроме текущего
        const activeaccordion = document.querySelector('.accordion.active');
        const activeContent = document.querySelector('.accordion__content.show');

        if (activeaccordion) {
            activeaccordion.classList.remove('active');
        }
        if (activeContent) {
            activeContent.classList.remove('active');
        }

        // Открываем текущий блок
        content.classList.add('active');
        accordion.classList.add('active');
    });
});


// Scroll nav

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

// Chekbox

checkboxes.forEach((checkbox) => {
    const icon = checkbox.nextElementSibling;
    const label = icon.nextElementSibling;
    checkbox.addEventListener('change', () => {
        icon.classList.toggle('checked');
        label.classList.toggle('checked');
        if (checkbox.parentNode.classList.contains("trash-checkbox")) {
            checkbox.parentNode.parentNode.parentNode.classList.toggle("active");
            const total = document.querySelector(".total span");
            setTotal(total);
        }
    });
});