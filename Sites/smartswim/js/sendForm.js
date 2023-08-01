async function sendForm(form) {
    const formData = new FormData(form);
    formData.append("where", form.parentNode.dataset.where)
    const inputs = form.querySelectorAll('.form-input')
    const preloader = document.querySelector('.preloader')
    const modals = document.querySelectorAll(".modal");

    $.ajax({
        url: "/ajax/send.php",
        type: "POST",
        cache: false,
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: () => {
            preloader.classList.add("shown")
            inputs.forEach((input) => {
                input.disabled = true
            })
        },
        success: (response) => {
            preloader.classList.remove("shown")
            inputs.forEach((input) => {
                input.disabled = false
                input.classList.remove("input-valid")
                input.value = ""
            })
            if (response === "success") {
                form.classList.contains("modal__form") && closeModal(modals[0]);
                modals[1].classList.add('modal__active');
                return true;
            } else {
                swal("Ошибка", response, "error")
            }

        },
        error: (response) => {
            preloader.classList.remove("shown")
            swal(`Ошибка ${response.status}`, response.statusText, "error")
            inputs.forEach((input) => {
                input.disabled = false
            })
            return false;
        },
    })
}