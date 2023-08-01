function validate(input) {
  let isValid = true
  switch (input.type) {
    case "text":
      isValid = isValidText(input);
      break
    case "email":
      isValid = isValidEmail(input);
      break
    case "tel":
      isValid = isValidPhone(input);
      break
    case "textarea":
      isValid = isValidText(input);
      break
    default:
      break
  }
  return isValid;
}

function setValidationField(element, state) {
  if (state) {
    element.parentNode.classList.add("success")
    element.parentNode.classList.remove("error")
  } else {
    element.parentNode.classList.add("error")
    element.parentNode.classList.remove("success")
  }
}

// Valid fio
function isValidText(text) {
  const re = /^[a-zA-Zа-яА-Я\s]+$/
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