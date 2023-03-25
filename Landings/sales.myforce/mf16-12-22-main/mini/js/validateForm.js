document.addEventListener("DOMContentLoaded", () => {
  const isValidInput = (input, fn) => {
    if (fn) {
      input.classList.add("success")
      input.classList.remove("error")
    } else {
      input.classList.remove("success")
      input.classList.add("error")
    }
  }

  // Valid fio
  const isValidfio = (fio) => {
    const re = /^[А-Яа-яЁё\s]+$/
    return re.test(String(fio).toLowerCase())
  }

  // Valid Phone
  const isValidPhone = (phone) => {
    return phone.length === 18
  }

  // Valid Email
  const isValidEmail = (email) => {
    const re =
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    return re.test(String(email).toLowerCase())
  }

  const sendForm = async (form, values) => {
    ;[fio, phone, email, region, queryString] = values
    fio = fio[0].toUpperCase() + fio.slice(1).toLowerCase()
    email === "" ? (email = "Не заполнен") : email
    console.log(region, queryString)
    $.ajax({
      url: "default_mf.php",
      type: "POST",
      cache: false,
      data: { fio, phone, email, region, queryString },
      dataType: "html",
      beforeSend: () => {
        form.querySelectorAll("input").forEach((input) => {
          if (input.classList.contains("success")) {
            input.classList.remove("success")
            input.disabled = true
          }
        })
        document.body.style.overflow = "hidden"
      },
      success: (data) => {
        setTimeout(() => {
          document.body.style.overflow = "auto"
          swal("Отлично", "Данные успешно отправлены", "success")
          form.querySelectorAll("input").forEach((input) => {
            input.disabled = false
            input.value = ""
          })
        }, 3000)
      },
      error: () => {
        setTimeout(() => {
          document.body.style.overflow = "auto"
          swal("Ошибка", "Данные не отправлены", "error")
          form.querySelectorAll("input").forEach((input) => {
            input.disabled = false
            input.value = ""
          })
        }, 3000)
      },
    })
  }

  // Validate forms
  const forms = document.querySelectorAll(".form-validate")
  forms.forEach((form) => {
    const fio = form.querySelector(".fio")

    const phone = form.querySelector(".phone")
    const email = form.querySelector(".email")
    const region = form.querySelector(".region")
    const queryString = form.querySelector(".query-string")

    form.addEventListener("submit", (e) => {
      console.log("Init!")
      e.preventDefault()

      isValidInput(fio, isValidfio(fio.value))
      isValidInput(phone, isValidPhone(phone.value))
      isValidInput(email, isValidEmail(email.value))

      if (
        isValidfio(fio.value) &&
        isValidPhone(phone.value) &&
        isValidEmail(email.value)
      ) {
        sendForm(form, [
          fio.value,
          phone.value,
          email.value,
          region.value,
          queryString.value,
        ])
      }
    })
  })
})
