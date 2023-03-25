document.addEventListener("DOMContentLoaded", () => {
  const firstModal = document.querySelector("#exampleModalToggle")
  const secondModal = document.querySelector("#exampleModalToggle2")
  const modal1 = new bootstrap.Modal(firstModal)
  const modal2 = new bootstrap.Modal(secondModal)
  const isValidInput = (input, fn) => {
    if (fn) {
      input.classList.add("success")
      input.classList.remove("error")
    } else {
      input.classList.remove("success")
      input.classList.add("error")
    }
  }

  // Valid Username
  const isValidUsername = (username) => {
    const re = /^[А-Яа-яЁё\s]+$/
    return re.test(String(username).toLowerCase())
  }

  // Valid Phone
  const isValidPhone = (phone) => {
    return phone.length === 18
  }

  // Valid Email
  const isValidEmail = (email) => {
    if (email === "") {
      return true
    } else {
      const re =
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      return re.test(String(email).toLowerCase())
    }
  }

  const sendForm = async (form, values) => {
    ;[username, phone, email] = values
    username = username[0].toUpperCase() + username.slice(1).toLowerCase()
    email === "" ? (email = "Не заполнен") : email

    $.ajax({
      url: "ajax/sendmail.php",
      type: "POST",
      cache: false,
      data: { username, phone, email },
      dataType: "html",
      beforeSend: () => {
        form.querySelectorAll("input").forEach((input) => {
          if (input.classList.contains("success")) {
            input.classList.remove("success")
            input.disabled = true
          }
        })
        document.body.style.overflow = "hidden"
        document.querySelector(".main-modal").style.display = "none"
        preloader.style.display = "flex"
      },
      success: (data) => {
        setTimeout(() => {
          preloader.style.display = "none"
          document.querySelector(".main-modal").style.display = "unset"
          document.body.style.overflow = "auto"
          modal1.hide()
          modal2.show()
          form.querySelectorAll("input").forEach((input) => {
            input.disabled = false
            input.value = ""
          })
        }, 3000)
      },
      error: () => {
        setTimeout(() => {
          preloader.style.display = "none"
          document.querySelector(".main-modal").style.display = "unset"
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
  const button = document.querySelector(".send-form")
  const preloader = document.querySelector(".preloader")
  forms.forEach((form) => {
    const username = form.querySelector(".username")

    const phone = form.querySelector(".phone")
    const email = form.querySelector(".email")

    form.addEventListener("submit", (e) => {
      console.log(email.value)
      e.preventDefault()

      isValidInput(username, isValidUsername(username.value))
      isValidInput(phone, isValidPhone(phone.value))
      isValidInput(email, isValidEmail(email.value))

      if (
        isValidUsername(username.value) &&
        isValidPhone(phone.value) &&
        isValidEmail(email.value)
      ) {
        sendForm(form, [username.value, phone.value, email.value])
      }
    })
  })
})
