document.addEventListener("DOMContentLoaded", () => {
    const trashControls = document.querySelectorAll(".trash__control");
    const total = document.querySelector(".total span");

    setTotal(total)
    trashControls.forEach(trashControl => {
        trashControl.addEventListener("click", (e) => {
            const priceContainer = trashControl.parentNode.querySelector(".card__control");
            price = trashControl.parentNode.querySelector(".card__control").classList.contains("sale")
                ? priceContainer.querySelector(".card__new-price")
                : priceContainer.querySelector(".card__price")
            const countBox = trashControl.querySelector("p");
            const count = parseInt(countBox.innerHTML);
            const userId = trashControl.querySelector("input[name='user-id']").value;
            const trashId = trashControl.querySelector("input[name='trash-id']").value;
            const sizeId = trashControl.querySelector("input[name='size-id']").value;
            const sign = e.target.classList.contains("decrease") ? "-" : "+";
            let result;
            $.ajax({
                url: '/ajax/setProductCount.php', // Укажите путь к обработчику на сервере
                method: 'POST',
                cache: false,
                data: { user_id: userId, trash_id: trashId, size_id: sizeId, sign }, // Передать данные для поиска
                success: function (response) {
                    if (response === "success") {
                        if (e.target.classList.contains("decrease") && count > 1) {
                            result = parseInt(price.innerHTML) / count * (count - 1);
                            countBox.innerHTML = count - 1;
                            price.innerHTML = result + " ₽";
                            setTotal(total)
                        } else if (e.target.classList.contains("decrease") && count === 1) {
                            $.ajax({
                                url: '/ajax/delete_order.php', // Укажите путь к обработчику на сервере
                                method: 'POST',
                                cache: false,
                                data: { user_id: userId, trash_id: trashId, size_id: sizeId }, // Передать данные для поиска
                                success: function (response) {
                                    if (response === "success") {
                                        location.reload();
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
                        if (e.target.classList.contains("increase")) {
                            result = parseInt(price.innerHTML) / count * (count + 1);
                            countBox.innerHTML = count + 1;
                            price.innerHTML = result + " ₽";
                            setTotal(total)
                        }
                    }
                },
                error: function (xhr, status, error) {
                    // Обработать ошибку, если такая произошла
                    console.log('Ошибка AJAX-запроса:', error);
                }
            });

        })
    })

})
