const addOrder = document.querySelector(".add-order");
addOrder.addEventListener("submit", () => {
    const rows = document.querySelectorAll('.trash__row.active');
    if (rows.length) {
        let order = "";
        rows.forEach(row => {
            const userId = row.querySelector("input[name='user-id']").value;
            const trashId = row.querySelector("input[name='trash-id']").value;
            const sizeId = row.querySelector("input[name='size-id']").value;
            const title = row.querySelector(".card__title").textContent;
            const price = row.querySelector(".card__control").classList.contains("sale")
                ? row.querySelector(".card__new-price").textContent
                : row.querySelector(".card__price").textContent
            const count = row.querySelector(".trash__control p").textContent;
            order += `<p><b>Наименование:</b> ${title}</p>`;
            order += `<p><b>Цена:</b> ${parseInt(price.split(" ")[0]) / count}</p>`;
            order += `<p><b>Количество:</b> ${count}</p><br>`;
            console.log(order);
            addOrder.insertAdjacentHTML("beforeend", `<input type='hidden' name='order' value='${order}'>`);
            if (sendForm(addOrder)) {
                $.ajax({
                    url: '/ajax/add_order.php', // Укажите путь к обработчику на сервере
                    method: 'POST',
                    cache: false,
                    data: { user_id: userId, trash_id: trashId, size_id: sizeId, count }, // Передать данные для поиска
                    success: function (response) {
                        if (response === "success") {
                            $.ajax({
                                url: '/ajax/delete_order.php', // Укажите путь к обработчику на сервере
                                method: 'POST',
                                cache: false,
                                data: { user_id: userId, trash_id: trashId, size_id: sizeId }, // Передать данные для поиска
                                success: function (response) {
                                    if (response === "success") {
                                        row.remove()
                                        window.location.href = "/shop/thanks.php";
                                    } else {
                                        swal("Ошибка", response, "error")
                                    }
                                },
                                error: function (xhr, status, error) {
                                    // Обработать ошибку, если такая произошла
                                    console.log('Ошибка AJAX-запроса:', error);
                                }
                            });
                            row.remove()
                        } else {
                            swal("Ошибка", response, "error")
                        }
                    },
                    error: function (xhr, status, error) {
                        // Обработать ошибку, если такая произошла
                        console.log('Ошибка AJAX-запроса:', error);
                    }
                });
            }
        })
        // window.location.href = "/profile/order.php";
    } else {
        swal("Ошибка", "Вы не выбрали товары для заказа", "error");
    }

})