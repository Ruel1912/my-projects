const searchInput = document.querySelector("input[name='search']");

searchInput.addEventListener("input", () => {
    $.ajax({
        url: '/ajax/search-product.php', // Укажите путь к обработчику на сервере
        method: 'POST',
        cache: false,
        data: { title: searchInput.value }, // Передать данные для поиска
        success: function (response) {
            // Очистить предыдущие результаты и добавить новые
            $('#cards').empty().append(response);
        },
        error: function (xhr, status, error) {
            // Обработать ошибку, если такая произошла
            console.log('Ошибка AJAX-запроса:', error);
        }
    });
})