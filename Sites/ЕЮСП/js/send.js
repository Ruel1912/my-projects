const successModal = document.querySelector(".success-modal");
const failModal = document.querySelector(".fail-modal");

async function sendForm(form) {
  const parentModal = form.parentNode.parentNode;
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
    url: "/backend/sendToBitrix.php",
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
      if (response === "success") {
        setTimeout(() => {
          preloader.classList.remove("shown");
          parentModal.classList.contains("modal") ? changeModal(parentModal, successModal) : openModal(successModal);
          inputs.forEach((input) => {
            input.disabled = false;
            input.parentNode.classList.remove("success");
            input.value = "";
          });
        }, 1000)
      } else {
        parentModal.classList.contains("modal") ? changeModal(parentModal, failModal) : openModal(failModal);
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

