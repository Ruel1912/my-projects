const articlesHtml = document.querySelectorAll(".article__item");
const inputSearch = document.querySelector(".article__search input");

inputSearch.addEventListener("input", () => {
    console.log(inputSearch.value.trim());
    articlesHtml.forEach(article => {
        const title = article.querySelector("h3").textContent.toLowerCase();
        if (inputSearch.value.trim()) {
            if (title.startsWith(inputSearch.value.toLowerCase())) {
                article.classList.remove("hidden");
            } else {
                article.classList.add("hidden");
            }
        } else {
            article.classList.remove("hidden");
        }

    })
})