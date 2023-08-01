document.addEventListener("DOMContentLoaded", () => {

    ymaps.ready(() => {
        initMap('Набережная канала Грибоедова, 19, Санкт-Петербург', 'map');
    });

    window.addEventListener('scroll', () => handleScroll(featuresBlock));
    function handleScroll(featuresBlock) {
        if (featuresBlock) {
            const rect = featuresBlock.getBoundingClientRect();
            if (rect.top - 200 <= window.innerHeight && rect.bottom >= 0) {
                featuresItems.forEach(featuresItem => featuresItem.classList.add("hovered"));
            }
        }
    }

    // Toggler
    document.querySelectorAll(".toggler").forEach(toggler => toggler.addEventListener("click", () => toggler.classList.toggle("active")))

    const checkboxes = document.querySelectorAll('.custom-checkbox input');
    const featuresBlock = document.querySelector('.features');
    const featuresItems = document.querySelectorAll('.features__item');
    const anchors = document.querySelectorAll(".anchor");
    const forms = document.querySelectorAll(".form");

    // Radio & Checkbox
    checkboxes.forEach((checkbox) => {
        const icon = checkbox.nextElementSibling;
        const label = icon.nextElementSibling;
        checkbox.addEventListener('change', () => {
            icon.classList.toggle('checked');
            label.classList.toggle('checked');
        });


    });

    // Anchors
    anchors.forEach((anchor) => {
        anchor.addEventListener("click", (e) => {
            e.preventDefault()
            document.querySelector(anchor.getAttribute("href")).scrollIntoView({ behavior: "smooth", block: "start" })
        })
    })

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

    // Forms 
    forms.forEach(form => {
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            const isAllInputsValid = Array.from(form.querySelectorAll(".form__row")).every(item => item.classList.contains("success"))
            const formCheckbox = form.querySelector("input[type='checkbox']");

            if (formCheckbox && !formCheckbox.checked && !formCheckbox.classList.contains("no-valid")) {
                swal("Ошибка", "Вы не дали согласие на обработку персональных данных", "error");
                return;
            }

            if (isAllInputsValid) {
                if (form.classList.contains("pay")) {
                    // pay(form);
                } else {
                    sendForm(form)
                }
            }
            else {
                form.querySelectorAll(".form__row input").forEach(input => !input.value && input.parentNode.classList.add("error"))
            }
        })
    })


})