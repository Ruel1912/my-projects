const header = document.querySelector(".header");
const progressBar = document.getElementById('progressBar');
const docElem = document.documentElement;

function toggleHeaderClass() {
  if (window.pageYOffset >= 50) {
    header.classList.add("header__active");
  } else {
    header.classList.remove("header__active");
  }
}

function updateProgressBarWidth() {
  progressBar.style.width = ((docElem.scrollTop / (docElem.scrollHeight - docElem.clientHeight)) * 100) + '%';
}

document.addEventListener("scroll", toggleHeaderClass);
window.addEventListener("scroll", updateProgressBarWidth);