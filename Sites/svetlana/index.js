ymaps.ready(init)
// YMaps
function init() {
  ymaps.geolocation
    .get({
      provider: "yandex",
    })
    .then(function (res) {
      var g = res.geoObjects.get(0)
      $("input[name=region]").val(g.getAdministrativeAreas()[0])
    })
    .catch(function (err) {
      console.log("Не удалось установить местоположение", err)
    })
}

// Masked on telephone
$(".phone").mask("+7 (999) 999-99-99")

$.fn.setCursorPosition = function (pos) {
  if ($(this).get(0).setSelectionRange) {
    $(this).get(0).setSelectionRange(pos, pos)
  } else if ($(this).get(0).createTextRange) {
    var range = $(this).get(0).createTextRange()
    range.collapse(true)
    range.moveEnd("character", pos)
    range.moveStart("character", pos)
    range.select()
  }
}

$('input[type="tel"]').click(function () {
  $(this).setCursorPosition(4) // set position number
})

const forms = document.querySelectorAll("form")
forms.forEach((form) => {
  form.addEventListener("submit", (e) => {
    e.preventDefault()
    const inputs = form.querySelectorAll(".input")
    validate(inputs)
  })
})
