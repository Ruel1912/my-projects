const body = document.body;
const modals = document.querySelectorAll(".modal");
const anchors = document.querySelectorAll(".anchor");
const openButtons = document.querySelectorAll(".open-modal");
const changeButtons = document.querySelectorAll(".change-modal");
const modalForm = document.querySelector(".main-modal .form")
const burger = document.querySelector(".burger");
const burgerMenu = document.querySelector(".burger-menu");
const burgerClose = document.querySelector(".close_burger");
const forms = document.querySelectorAll(".form");


function validate(input) {
    let isValid = true
    switch (input.type) {
        case "text":
            isValid = isValidText(input);
            break
        case "email":
            isValid = isValidEmail(input);
            break
        case "tel":
            isValid = isValidPhone(input);
            break
        case "textarea":
            isValid = isValidText(input);
            break
        default:
            break
    }
    return isValid;
}

function setValidationField(element, state) {
    if (state) {
        element.parentNode.classList.add("success")
        element.parentNode.classList.remove("error")
    } else {
        element.parentNode.classList.add("error")
        element.parentNode.classList.remove("success")
    }
}

// Valid fio
function isValidText(text) {
    const re = /^[a-zA-Zа-яА-Я\s]+$/
    if (re.test(String(text.value).toLowerCase())) {
        setValidationField(text, true)
        return true
    }
    setValidationField(text, false)
    return false
}

// Valid Email
function isValidEmail(email) {
    const re =
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    if (re.test(String(email.value).toLowerCase())) {
        setValidationField(email, true)
        return true
    }
    setValidationField(email, false)
    return false
}

function isValidPhone(phone) {
    if (phone.value.length === 18) {
        setValidationField(phone, true)
        return true
    }
    setValidationField(phone, false)
    return false
}

function openModal(modal) {
    modal.classList.add("modal__active");
    body.classList.add("hidden");
}

function closeModal(modal) {
    modal.classList.remove("modal__active");
    body.classList.remove("hidden");
}

function changeModal(closedModal, openedModal) {
    closedModal.classList.remove("modal__active");
    openedModal.classList.add("modal__active");
}

async function sendForm(form) {
    const formData = new FormData(form);
    let fio = formData.get('fio');
    fio = fio
        .split(" ")
        .map((data) => data[0].toUpperCase() + data.slice(1).toLowerCase())
        .join(" ")
    formData.set('fio', fio);
    const inputs = form.querySelectorAll('.form-input')
    const preloader = document.querySelector('.preloader')

    $.ajax({
        url: "/site/send-form",
        type: "POST",
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        beforeSend: () => {
            preloader.classList.add("shown")
            inputs.forEach((input) => {
                input.disabled = true
            })
        },
        success: (response) => {
            response = JSON.parse(response);
            preloader.classList.remove("shown");
            if (response.type === "success") {
                openModal(document.querySelector(".thank-modal"));
                inputs.forEach((input) => {
                    input.disabled = false
                    input.parentNode.classList.remove("success")
                    input.value = ""
                });
            } else {
                swal("Ошибка", "", "error")
            }
        },
        error: (response) => {
            response = JSON.parse(response);
            preloader.classList.remove("shown")
            swal(`Ошибка`, "", "error")
            inputs.forEach((input) => {
                input.disabled = false
            })
        },
    })
}

ymaps.ready(init)
// YMaps
function init() {
    ymaps.geolocation
        .get({
            provider: "yandex",
        })
        .then(function (res) {
            var g = res.geoObjects.get(0)
            $(".region").val(g.getAdministrativeAreas()[0])
        })
        .catch(function (err) {
            console.log("Не удалось установить местоположение", err)
        })
}

// Masked on telephone
$("[name='phone']").mask("+7 (999) 999-99-99")

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


forms.forEach(form => {
    const formInputs = form.querySelectorAll('.form_input');
    const formButton = form.querySelector(".button");
    formInputs.forEach(formInput => formInput.addEventListener("change", () => {
        const isAllInputsValid = Array.from(formInputs).every(item => item.parentNode.classList.contains("success"));
        formButton.disabled = !isAllInputsValid;
    }));

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        sendForm(form);
    })
})

burger.addEventListener("click", () => {
    if (burger.classList.contains("burger__active")) {
        burger.classList.remove("burger__active");
        burgerMenu.classList.remove("active");
    } else {
        burger.classList.add("burger__active");
        burgerMenu.classList.add("active");
    }
});


burgerClose.addEventListener("click", () => {
    burger.classList.remove("burger__active");
    burgerMenu.classList.remove("active");
})

openButtons.forEach(openButton =>
    openButton.addEventListener("click", () => {
        const modal = document.querySelector(`.${openButton.dataset.modal}-modal`);
        openModal(modal);
    }))

changeButtons.forEach(changeButton => changeButton.addEventListener("click", (e) => {
    e.preventDefault()
    const closedModal = document.querySelector(`.${changeButton.dataset.closedmodal}-modal`);
    const openedModal = document.querySelector(`.${changeButton.dataset.openedmodal}-modal`);
    changeModal(closedModal, openedModal);
})
)

modals.forEach((modal) => modal.addEventListener("click", (e) => {
    if (e.target === modal || e.target.classList.contains("close")) {
        closeModal(modal);
    }
}));

//Аккордеон
const accordions = document.querySelectorAll(".accordion");
accordions.forEach((accordion) => accordion.addEventListener('click', () => accordion.classList.toggle('active')));

//Поля для сообщений
const textareaWrappers = document.querySelectorAll(".form_row.textarea");
textareaWrappers.forEach(textareaWrapper => {
    const textareaNumber = textareaWrapper.querySelector(".form_row_header").children[1];
    const textarea = textareaWrapper.querySelector("textarea");
    textarea.addEventListener("input", () => {
        const textareaLength = textarea.value.length;
        if (textareaLength > 300) {
            textareaWrapper.classList.add("error");
            textareaWrapper.nextElementSibling.disabled = true;
        } else {
            textareaWrapper.classList.remove("error");
            textareaWrapper.nextElementSibling.disabled = false;
        }
        textareaNumber.textContent = `${textarea.value.length}/300`;
    })

})
