const inputEl = document.querySelector('.add__search input');
const result = document.querySelector(".search-results");
const userId = document.querySelector(".user_id");

if (inputEl) {
    inputEl.addEventListener('input', () => {

        $.ajax({
            url: '/ajax/search-student.php', // Укажите путь к обработчику на сервере
            method: 'POST',
            cache: false,
            data: { searchValue: inputEl.value }, // Передать данные для поиска
            success: function (response) {
                // Очистить предыдущие результаты и добавить новые
                $('.search-results').empty().append(response);
            },
            error: function (xhr, status, error) {
                // Обработать ошибку, если такая произошла
                console.log('Ошибка AJAX-запроса:', error);
            }
        });

    });
}

if (result) {
    result.addEventListener("click", (e) => {
        if (e.target.classList.contains("user_item")) {
            const students = document.querySelectorAll(".user_item")
            students.forEach(student => {
                student.classList.remove("selected");
            })
            e.target.classList.add("selected");
            userId.value = e.target.dataset.id;
        }
    })
}
