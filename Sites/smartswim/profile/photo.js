const fileInput = document.getElementById("photo");
const submitButton = document.querySelector("button[type=submit]");

fileInput.addEventListener("change", () => {
    submitButton.click();
});