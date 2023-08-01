const hearts = document.querySelectorAll(".prdouct__heart");
const addOrder = document.querySelector(".add-order");
hearts.forEach(heart => {
    const id = heart.querySelector("input[name='productId']").value;
    const svg = heart.querySelector("svg");
    heart.addEventListener("click", () => {
        $.ajax({
            url: '/ajax/favourite.php', // Укажите путь к обработчику на сервере
            method: 'POST',
            data: { id }, // Передать данные для поиска
            cache: false,
            success: function (response) {
                if (response === "add") {
                    svg.classList.add("fill");
                }
                if (response === "remove") {
                    svg.classList.remove("fill");
                }
                location.reload();
            },
            error: function (xhr, status, error) {
                // Обработать ошибку, если такая произошла
                console.log('Ошибка AJAX-запроса:', error);
            }
        });
    })
})