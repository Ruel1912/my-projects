// Valid fio
function isValidfio(fio) {
  const re = /^[А-Яа-яЁё\s]+$/;
  return re.test(String(fio).toLowerCase());
}

// Valid Phone
function isValidPhone(phone) {
  return phone.length === 18;
}

// Valid Email
function isValidEmail(email) {
  const re =
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

function koleno() {
  console.log(1);
}
/**
 *Устанавливаем статус проверяемого поля
 * @param {*} element
 * @param {*} state
 */
function setValidationField(element, state) {
  if (state) {
    element.removeClass("error");
    element.addClass("success");
  } else {
    element.addClass("error");
    element.removeClass("success");
  }
}

document.addEventListener("DOMContentLoaded", () => {
  $("#form-validate").submit(function (e) {
    e.preventDefault();
    let phone_val = $(this).find(".phone").val();
    let fio_val = $(this).find(".fio").val();
    let email_val = $(this).find(".email").val();
    let region_val = $(this).find(".region").val();
    let query_string_val = $(this).find(".query-string").val();
    let success = true;

    if (isValidPhone(phone_val)) {
      setValidationField($(this).find(".phone"), true);
    } else {
      setValidationField($(this).find(".phone"), false);
      success = false;
    }
    if (isValidfio(fio_val)) {
      setValidationField($(this).find(".fio"), true);
    } else {
      setValidationField($(this).find(".fio"), false);
      success = false;
    }

    if (isValidEmail(email_val)) {
      setValidationField($(this).find(".email"), true);
    } else {
      setValidationField($(this).find(".email"), false);
      success = false;
    }
    if (success) {
      $.ajax({
        type: "POST",
        url: "default_mf.php",
        data: {
          fio: fio_val,
          phone: phone_val,
          email: email_val,
          region: region_val,
          query_string: query_string_val,
        },
        // cache: false,
        dataType: "json",
        // processData: false, // отключаем обработку передаваемых данных, пусть передаются как есть
        // contentType: false, // отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
        success: function (result) {
          jQuery("#form-validate")[0].reset();
          swal(
            "Форма успешно отправлена",
            "Cкоро с вами свяжется наш менеджер",
            "success"
          );
        }, //!* Ошибка при получении данных *!/
        error: function (error) {
          swal("Форма не отправленна", "Повторите позже!", "error");
        },
      });
    }
  });

  $(".form-validate").submit(function (e) {
    e.preventDefault();
    let phone_val = $(this).find(".phone").val();
    let fio_val = $(this).find(".fio").val();
    let email_val = $(this).find(".email").val();
    let region_val = $(this).find(".region").val();
    let query_string_val = $(this).find(".query-string").val();
    let success = true;

    if (isValidPhone(phone_val)) {
      setValidationField($(this).find(".phone"), true);
    } else {
      setValidationField($(this).find(".phone"), false);
      success = false;
    }
    if (isValidfio(fio_val)) {
      setValidationField($(this).find(".fio"), true);
    } else {
      setValidationField($(this).find(".fio"), false);
      success = false;
    }

    if (isValidEmail(email_val)) {
      setValidationField($(this).find(".email"), true);
    } else {
      setValidationField($(this).find(".email"), false);
      success = false;
    }
    if (success) {
      $.ajax({
        type: "POST",
        url: "default_mf.php",
        data: {
          fio: fio_val,
          phone: phone_val,
          email: email_val,
          region: region_val,
          query_string: query_string_val,
        },
        // cache: false,
        dataType: "json",
        // processData: false, // отключаем обработку передаваемых данных, пусть передаются как есть
        // contentType: false, // отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
        success: function (result) {
          jQuery(".form-validate")[0].reset();
          swal(
            "Форма успешно отправлена",
            "Cкоро с вами свяжется наш менеджер",
            "success"
          );
        }, //!* Ошибка при получении данных *!/

        error: function (error) {
          swal("Форма не отправленна", "Повторите позже!", "error");
        },
      });
    }
  });
});
