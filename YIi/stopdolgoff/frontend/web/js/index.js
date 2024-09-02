const accordions = document.querySelectorAll('.accordion');

accordions.forEach((accordion) => {
    accordion.addEventListener('click', () => {
        const content = accordion.querySelector(".accordion__content");
        // Закрываем текущий блок, если он уже открыт
        if (content.classList.contains('active')) {
            content.classList.remove('active');
            accordion.classList.remove('active');
            return;
        }

        // Закрываем все блоки, кроме текущего
        const activeaccordion = document.querySelector('.accordion.active');
        const activeContent = document.querySelector('.accordion__content.show');

        if (activeaccordion) {
            activeaccordion.classList.remove('active');
        }
        if (activeContent) {
            activeContent.classList.remove('active');
        }

        // Открываем текущий блок
        content.classList.add('active');
        accordion.classList.add('active');
    });
});
