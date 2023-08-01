document.addEventListener("DOMContentLoaded", () => {
    const selects = document.querySelectorAll(".select");

    selects.forEach((select) => {
        select.addEventListener("click", () => {
            select.classList.toggle("active");
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
                select.querySelector(".select__header").style.color = "#222";
                title.innerHTML = option.textContent;
                input.value = option.textContent;
            });
        });
    });
});
