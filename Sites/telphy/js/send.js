const thankModal = document.querySelector(".thanks-modal");
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
    url: "/ajax/default_mf.php",
    type: "POST",
    cache: false,
    contentType: false,
    processData: false,
    data: formData,
    beforeSend: () => {
      debugger
      preloader.classList.add("shown")
      inputs.forEach((input) => {
        input.disabled = true
      })
    },
    success: (response) => {
      if (response === "success") {
        setTimeout(() => {
          preloader.classList.remove("shown")
          thankModal.classList.add("modal__active");
          inputs.forEach((input) => {
            input.disabled = false
            input.parentNode.classList.remove("success")
            input.value = ""
          });
        }, 1000)
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
    },
  })
}