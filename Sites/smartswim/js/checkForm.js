document.addEventListener("DOMContentLoaded", () => {
    const forms = document.querySelectorAll('.form');

    forms.forEach((form) => {
        const submitButton = form.querySelector('.send-button');
        submitButton.disabled = true
        form.addEventListener("change", () => validateForm(form, submitButton))
        form.addEventListener("submit", (e) => {
            e.preventDefault()
            !form.classList.contains("add-order") && sendForm(form)
        })
    });



    function validateForm(form, submitButton) {
        const inputs = form.querySelectorAll('.form-input')
        const checkbox = form.querySelector('.form-agree')
        let valid = true;
        inputs.forEach((input) => {
            if (!input.checkValidity()) {
                valid = false;
                input.classList.remove('input-valid');
                input.classList.add('input-invalid');
            } else {
                input.classList.remove('input-invalid');
                input.classList.add('input-valid');
            }
        });
        if (checkbox && !checkbox.checked && checkbox.type === "checkbox") {
            valid = false;
        }
        submitButton.disabled = !valid;
    }
}) 
