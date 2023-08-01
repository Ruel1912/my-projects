const settings = document.querySelector(".nav__settings");
function checkScreenWidth() {
    if (window.innerWidth < 768 || /Mobi/.test(navigator.userAgent)) {
        settings.href = "setting.php";
        settings.classList.remove("active");
    } else {
        settings.href = "index.php";
        settings.classList.add("active");
    }
}

// Вызываем функцию при загрузке страницы
checkScreenWidth();
// Вызываем функцию при изменении размера окна
window.addEventListener('resize', checkScreenWidth);