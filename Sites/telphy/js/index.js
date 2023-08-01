const modals = document.querySelectorAll(".modal");
const forms = document.querySelectorAll(".form");
const inputs = document.querySelectorAll(".form-input");
const modalForm = document.querySelector(".main-modal .form")
const inputEmail = document.querySelector(".main-modal input[type='email'")
const notes = document.querySelectorAll(".why__note");
const images = document.querySelectorAll(".why__image img");


ymaps.ready(init)
// YMaps
function init() {
  ymaps.geolocation
    .get({
      provider: "yandex",
    })
    .then(function (res) {
      var g = res.geoObjects.get(0)
      $("input[name=region]").val(g.getAdministrativeAreas()[0])
    })
    .catch(function (err) {
      console.log("Не удалось установить местоположение", err)
    })
}
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

forms.forEach(form => {
    form.addEventListener("submit", (e) => {
        e.preventDefault()
        const isAllInputsValid = Array.from(form.querySelectorAll(".form__row")).every(item => item.classList.contains("success"))
        if (isAllInputsValid) {
            if (form.classList.contains("modal__form")) {
                const activeModal = document.querySelector(".modal__active");
                modals.forEach((modal, index) => {
                    if (modal === activeModal && index !== 3) {
                        activeModal.classList.remove("modal__active");
                        if (index === 0) {
                            const checkInputEmail = modals[1].querySelector("input[type='email']");
                            checkInputEmail.value = inputEmail.value
                            checkInputEmail.parentNode.classList.add("success");
                            modals[index + 1].classList.add("modal__active");
                        }
                        if (index === 1) {
                            // sendForm(modalForm);
                        }
                    }
                })
            } else {
                // sendForm(form)
            }
        } else {
            form.querySelectorAll(".form__row input").forEach(input => !input.value && input.parentNode.classList.add("error"))
        }
    })
})


notes.forEach((note, index) => {
    note.addEventListener("mouseover", () => {
        images.forEach(image => image.style.display = "none");
        images[index].style.display = "block";
    })
})