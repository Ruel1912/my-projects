const files = document.querySelectorAll(".file")
files.forEach(file => {
    const fileTitle = file.querySelector("span")
    const fileInput = file.querySelector("input[type='file']")
    fileInput.addEventListener("change", () => {
        const selectedFile = fileInput.files[0]
        if (selectedFile) {
            fileTitle.innerHTML = selectedFile.name
        }
    })
})