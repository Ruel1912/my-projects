document.addEventListener("DOMContentLoaded", () => {
  // Masked on telephone
  $(".tel-mask").mask("+7 (999) 999-99-99");

  $.fn.setCursorPosition = function (pos) {
    if ($(this).get(0).setSelectionRange) {
      $(this).get(0).setSelectionRange(pos, pos);
    } else if ($(this).get(0).createTextRange) {
      var range = $(this).get(0).createTextRange();
      range.collapse(true);
      range.moveEnd("character", pos);
      range.moveStart("character", pos);
      range.select();
    }
  };

  $('input[type="tel"]').click(function () {
    $(this).setCursorPosition(4); // set position number
  });

  const getMobileNav = function () {
    const hamburger = document.querySelector(".hamburger");
    const mobileNav = document.querySelector(".mobile__nav");
    const mobileItem = document.querySelectorAll(".mobile__item");
    const body = document.querySelector("body");

    hamburger.addEventListener("click", function () {
      mobileNav.classList.toggle("mobile__active");
      body.classList.toggle("active__body");
    });
    mobileItem.forEach(function (item) {
      item.addEventListener("click", function () {
        mobileNav.classList.remove("mobile__active");
        body.classList.remove("active__body");
      });
    });
  };

  getMobileNav();

  const getSvgFocus = function () {
    const svgFocus = document.querySelectorAll(".svg-focus");

    svgFocus.forEach(function (item) {
      item.addEventListener("click", function () {
        item.classList.add("svg-focus__active");
      });
    });
  };

  getSvgFocus();
});
