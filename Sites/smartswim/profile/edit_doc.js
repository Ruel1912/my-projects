const edits = document.querySelectorAll(".edit")
const add_forms = document.querySelectorAll(".add__form")

edits.forEach(edit => {
    edit.addEventListener("click", () => {
        edit.classList.toggle("active")
    })
})

add_forms.forEach(add_form => {
    const inputFile = add_form.querySelector("input[type='file']")
    const inputSubmit = add_form.querySelector("input[type='submit']")
    inputFile.addEventListener("change", () => {
        inputSubmit.click()
    })
})