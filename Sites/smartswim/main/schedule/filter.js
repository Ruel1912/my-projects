
function setTitle(title, filter) {
    title.innerHTML = filter.innerHTML
}

function setNewSelected(oldSelected, newSelected) {
    oldSelected.classList.remove("selected")
    newSelected.classList.add("selected")
}

async function send() {
    [age, fio, day, service] = document.querySelectorAll("span.accordion__title.selected")
    $.ajax({
        type: 'POST',
        url: '/ajax/filter.php', // Путь к скрипту для обновления таблицы
        data: { age: age.dataset.value, name: fio.dataset.value, day: day.dataset.value, service: service.dataset.value }, // Передаем значения фильтров
        success: function (data) {
            // Обновляем таблицу данными из ответа сервера
            $("#table-coaches").html(data);
        },
        error() {
            swal("Ошибка", "Данные не отправлены", "error")

        }
    });
}

$(document).ready(function () {
    const accordions = document.querySelectorAll(".table__control .accordion")
    accordions.forEach(accordion => {
        const title = accordion.querySelector("p.accordion__title")
        const filter = accordion.querySelector("span.accordion__title.selected")
        if (!title.parentNode.parentNode.classList.contains("name")) {
            setTitle(title, filter)
        } else {
            setTitle(title, document.querySelector(".breadcrumbs__link_active"))
            setNewSelected(filter, document.querySelector(`[data-value='${title.innerHTML}']`))
        }

        const filteres = accordion.querySelectorAll("span.accordion__title")
        filteres.forEach(filter => {
            filter.addEventListener("click", (e) => {
                setTitle(title, filter)
                setNewSelected(accordion.querySelector("span.accordion__title.selected"), filter)
                send()
            })
        })

        document.querySelector(".table__reset").addEventListener("click", () => {
            const titles = document.querySelectorAll("p.accordion__title")
            titles.forEach(title => {
                title.innerHTML = title.dataset.default
                filteres.forEach((filter) => {
                    filter.dataset.value === ""
                        ? filter.classList.add("selected")
                        : filter.classList.remove("selected")
                })
            })
            send()
        })
    })
});
