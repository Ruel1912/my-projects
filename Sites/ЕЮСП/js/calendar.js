document.addEventListener('DOMContentLoaded', function () {
    const monthYearHeader = document.querySelector('.calendar__month-year');
    const datesContainer = document.querySelector('.calendar__dates');
    const selectedDateInput = document.querySelector('#selected-date');
    const selectTimeItems = document.querySelectorAll(".select_time_item");
    const modalTitles = document.querySelectorAll(".titles h2");
    const modalText = document.querySelector(".consult__text");
    const citySelect = document.querySelector(".select-city");
    const selects = document.querySelectorAll(".select");
    const resultOrder = document.querySelector(".result-order");
    const serviceForm = document.querySelector(".service-modal form");
    const currentDate = new Date();
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();

    renderCalendar(currentMonth, currentYear);

    checkSelect();

    document.querySelector('.calendar__prev-btn').addEventListener('click', function () {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        renderCalendar(currentMonth, currentYear);
    });

    document.querySelector('.calendar__next-btn').addEventListener('click', function () {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        renderCalendar(currentMonth, currentYear);
    });

    selects.forEach(select => select.addEventListener("click", checkSelect));

    function renderCalendar(month, year) {
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const daysInMonth = lastDay.getDate();
        const startDayOfWeek = firstDay.getDay();

        monthYearHeader.textContent = getMonthName(month) + ' ' + year;

        datesContainer.innerHTML = '';

        // Вычисляем количество пустых ячеек перед первым днем месяца
        const emptyCells = startDayOfWeek === 0 ? 6 : startDayOfWeek - 1;

        // Создаем пустые ячейки перед первым днем месяца
        for (let i = 0; i < emptyCells; i++) {
            const dateElement = document.createElement('div');
            dateElement.classList.add('calendar__date', 'empty');
            datesContainer.appendChild(dateElement);
        }

        for (let i = 1; i <= daysInMonth; i++) {
            const dateElement = document.createElement('div');
            dateElement.classList.add('calendar__date');
            dateElement.textContent = i;
            datesContainer.appendChild(dateElement);

            if (month === currentDate.getMonth() && year === currentDate.getFullYear() && i < currentDate.getDate()) {
                dateElement.classList.add('calendar__before');
            }

            dateElement.addEventListener('click', function () {
                selectDate(i, month, year);
            });

        }

    }

    function selectDate(day, month, year) {
        let selectedDate = new Date(year, month, day + 1);
        selectedDate = selectedDate.toISOString().slice(0, 10).replaceAll("-", ".");
        selectedDateInput.value = selectedDate;

        const selectedDateElements = document.querySelectorAll('.calendar__date.selected');
        selectedDateElements.forEach(function (element) {
            element.classList.remove('selected');
        });

        const clickedDateElement = event.target;
        clickedDateElement.classList.add('selected');
        document.querySelector(".select_date-title").textContent = selectedDate;
        checkToday(selectedDate);
        // document.querySelector(".select_date").classList.remove("active");

    }

    function getMonthName(month) {
        const monthNames = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
        return monthNames[month];
    }

    function checkToday(selectedDate) {
        const currentDate = new Date();
        const currentFormattedDate = currentDate.toISOString().slice(0, 10).replace(/-/g, ".");

        if (selectedDate === currentFormattedDate) {
            const currentTime = `${String(currentDate.getHours()).padStart(2, '0')}:${String(currentDate.getMinutes()).padStart(2, '0')}`;
            if (currentTime > "19:00") {
                document.querySelector(".select-time").classList.add("hide");
                return;
            }
            selectTimeItems.forEach(selectTimeItem => {
                currentTime > selectTimeItem.textContent && selectTimeItem.classList.add("hide");
            })
        } else {
            selectTimeItems.forEach(selectTimeItem => {
                selectTimeItem.classList.remove("hide");
            })
        }
    }

    function checkSelect() {
        const selectTime = document.querySelector(".select-time");
        const selectCity = document.querySelector(".select-city");
        const selectDate = document.querySelector(".select_date");
        const selectTimeInput = selectTime.querySelector("input").value;
        const selectCityInput = selectCity.querySelector("input").value;
        const selectDateInput = selectDate.querySelector("input").value;
        if (selectCity.classList.contains("hide")) {
            if (selectTimeInput && selectDateInput) {
                resultOrder.textContent = `Выбранная дата: ${selectDateInput} в ${selectTimeInput}`;
            }
        } else {
            if (selectTimeInput && selectDateInput && selectCityInput) {
                resultOrder.textContent = `Выбранная дата: ${selectDateInput} в ${selectTimeInput}, ${selectCityInput}`;
            }
        }
    }

    modalTitles.forEach(modalTitle => {
        modalTitle.addEventListener("click", () => {
            if (modalTitle.classList.contains("online")) {
                modalTitles[0].classList.add("active");
                modalTitles[1].classList.remove("active");
                modalText.textContent = "Вы можете самостоятельно записаться на онлайн — консультацию по телефону.";
                citySelect.classList.add("hide");
            } else {
                modalTitles[0].classList.remove("active");
                modalTitles[1].classList.add("active");
                modalText.textContent = "Вы можете самостоятельно записаться на очную консультацию.";
                citySelect.classList.remove("hide");
            }
            resultOrder.textContent = "";
        })

    })

    serviceForm.addEventListener("submit", (e) => {
        debugger
        e.preventDefault();
        const isAllInputsValid = Array.from(serviceForm.querySelectorAll(".form__row")).every(item => item.classList.contains("success"))
        if (isAllInputsValid && resultOrder.textContent !== "") {
            sendForm(serviceForm);
        }
        else {
            serviceForm.querySelectorAll(".form__row input").forEach(input => !input.value && input.parentNode.classList.add("error"))
        }
    })

});
