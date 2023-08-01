document.addEventListener("DOMContentLoaded", () => {
    const selects = document.querySelectorAll(".select");

    selects.forEach((select) => {
        select.addEventListener("click", (e) => {
            if (select.classList.contains("select_date")) {
                if (e.target.classList.contains("calendar__date") && !e.target.classList.contains("empty")) {
                    select.classList.remove("active");
                } else {
                    select.classList.add("active");
                }
            } else {
                select.classList.toggle("active");
            }
        });
        const options = select.querySelectorAll(".select__content p");
        options.forEach((option) => {
            option.addEventListener("click", () => {
                const title = select.querySelector(".select__header p");
                const input = select.querySelector("input[type='hidden']");
                options.forEach((option) => {
                    option.classList.remove("active");
                });
                option.classList.add("active");
                title.innerHTML = option.textContent;
                input.value = option.textContent;
            });
        });
    });
});
