const slides = document.querySelectorAll('.slide');

slides.forEach((slide) => {
    slide.addEventListener('click', () => {
        clearActiveClasses()

        slide.classList.add('active');
    })
})

const clearActiveClasses = () => {
    slides.forEach((slide) => {
        slide.classList.remove('active');
    })
}