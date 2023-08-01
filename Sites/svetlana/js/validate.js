function validate(inputs, send = true) {

  let isValid = true
  inputs.forEach((input) => {
    switch (input.type) {
      case "text":
        if (!isValidText(input)) {
          isValid = false
        }
        break
      case "email":
        if (!isValidEmail(input)) {
          isValid = false
        }
        break
      case "tel":
        if (!isValidPhone(input)) {
          isValid = false
        }
        break
      default:
        break
    }
  })
  if (isValid) {
    send ? sendForm(inputs) : true
  } else {
    return false
  }

  return true
}

function setValidationField(element, state) {
  if (state) {
    element.classList.add("success")
    element.classList.remove("error")
  } else {
    element.classList.add("error")
    element.classList.remove("success")
  }
}

// Valid fio
function isValidText(text) {
  const re = /^[А-Яа-яЁё\s]+$/
  if (re.test(String(text.value).toLowerCase())) {
    setValidationField(text, true)
    return true
  }
  setValidationField(text, false)
  return false
}

// Valid Email
function isValidEmail(email) {
  const re =
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
  if (re.test(String(email.value).toLowerCase())) {
    setValidationField(email, true)
    return true
  }
  setValidationField(email, false)
  return false
}

function isValidPhone(phone) {
  if (phone.value.length === 18) {
    setValidationField(phone, true)
    return true
  }
  setValidationField(phone, false)
  return false
}
