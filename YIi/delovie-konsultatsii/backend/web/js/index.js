const containsSubstringInArray = (arr, substring) => {
  let isInclue = false;
  arr.forEach(item => {
    if (item.includes(substring)) isInclue = true;
  })
  return isInclue;
}

// Анимация слайдера
const promoItems = document.querySelectorAll(".promo_item");
promoItems.forEach(promoItem => promoItem.addEventListener("click", () => {
  promoItems.forEach(promoItem => promoItem.classList.remove('active'));
  promoItem.classList.add('active');
  document.querySelector(".promo_wrapper").classList.add("hide");
}))

document.addEventListener("click", (e) => {
  if (!containsSubstringInArray(e.target.classList, "promo")) {
    document.querySelector(".promo_wrapper").classList.remove("hide");
    promoItems.forEach(promoItem => promoItem.classList.remove('active'));
  }
})


const promoSlider = new Swiper(".promo_items", {
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      spaceBetween: 10,
      slidesPerView: 1,
      loop: true,
    },
    680: {
      spaceBetween: 1,
      slidesPerView: 4,
      grid: {rows: 2}, 
    }
  }
});

