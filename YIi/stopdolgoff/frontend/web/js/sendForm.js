function sendForm(form, filephp) {
    // добавляем обработчик события отправки формы
    // отменяем стандартное поведение формы
    // // создаем элемент для лоадера
    // var loader = document.createElement('div');
    // loader.textContent = 'Отправка данных...';
    // loader.classList.add('loader');
    // document.body.appendChild(loader);
    //
    // // собираем данные формы
    // var formData = new FormData(form);
    //
    // // создаем объект XMLHttpRequest
    // var xhr = new XMLHttpRequest();
    //
    // // настраиваем параметры запроса
    // xhr.open('POST', filephp);
    //
    // // добавляем заголовок для передачи данных в формате FormData
    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    //
    // // добавляем обработчик события изменения состояния запроса
    // xhr.onreadystatechange = function () {
    //     if (xhr.readyState === XMLHttpRequest.DONE) {
    //         // скрываем лоадер
    //         document.body.removeChild(loader);
    //
    //         // обработка ответа сервера
    //         if (xhr.status === 200) {
    //             // успешный ответ
    //             console.log(xhr.responseText);
    //         } else {
    //             // ошибка сервера
    //             console.log('Error: ' + xhr.status);
    //         }
    //     }
    // };

    // // отправляем запрос на сервер
    // xhr.send(formData);
}