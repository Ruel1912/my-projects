const preloader = document.querySelector(".preloader")
const sendForm = async (inputs) => {
  const data = {}
  inputs.forEach((input) => {
    if (input.name === "fio") {
      input.value = input.value
        .split(" ")
        .map((data) => data[0].toUpperCase() + data.slice(1).toLowerCase())
        .join(" ")
    }
    data[input.name] = input.value.trim()
  })

  $.ajax({
    url: "/ajax/sendmail.php",
    type: "POST",
    cache: false,
    data: data,
    dataType: "html",
    beforeSend: () => {
      preloader.classList.add("shown")
      inputs.forEach((input) => {
        input.disabled = true
      })
    },
    success: (response) => {
      if (response === "success") {
        if (inputs[0].classList.contains("modal__input")) {
          closeModal(modals[0]);
          modals[1].classList.add('modal__active');
        } else {
          window.location.href = "/thanks.html"
        }
      } else {
        swal("Ошибка", response, "error")
      }
      preloader.classList.remove("shown")
      inputs.forEach((input) => {
        input.disabled = false
        input.classList.remove("error")
        input.value = ""
      })
    },
    error: (response) => {
      preloader.classList.remove("shown")
      swal(`Ошибка ${response.status}`, response.statusText, "error")
      inputs.forEach((input) => {
        input.disabled = false
      })
    },
  })
}