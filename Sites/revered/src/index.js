import "./index.html"
import "./index.scss"

const cardRates     = document.querySelectorAll(".pricing__card__amount__rate"),
      cardTimes     = document.querySelectorAll(".pricing__card__amount__time"),
      burgerClose   = document.querySelector(".burger-menu__close"),
      pricingCards  = document.querySelectorAll(".pricing__card"),
      burger        = document.querySelector(".burger"),
      burgerMenu    = document.querySelector(".burger-menu");
 
burger?.addEventListener("click", () => {
  if (burger?.classList.contains("burger__active")) {
      burger?.classList.remove("burger__active");
      burgerMenu?.classList.remove("active");
  } else {
      burger?.classList.add("burger__active");
      burgerMenu?.classList.add("active");
  }
});

burgerClose?.addEventListener("click", () => {
  burger?.classList.remove("burger__active");
  burgerMenu?.classList.remove("active");
})

async function fetchExchangeRates() {
  try {
    const response = await fetch('https://api.exchangerate-api.com/v4/latest/USD');
    const data = await response.json();

    return {
      '₽': data.rates.RUB,
      '$': 1,
      '€': data.rates.EUR,
    }
  } catch (error) {
    console.error('Ошибка при получении курсов валют:', error);
  }
}

function changeCardPrices(action) {
  pricingCards.forEach(pricingCard => {
    let cardRate  = pricingCard.querySelector(".pricing__card__amount__rate"),
        cardValue = pricingCard.querySelector(".pricing__card__amount__value"),
        cardTime  = pricingCard.querySelector(".pricing__card__amount__time")

    switch(action) {
      case 'time': 
        changeTime(cardTime, cardValue);
        break;
      case 'rate': 
        changeRate(cardRate, cardValue);
        break;
      default:
        break;
    }
  })
}

function changeTime(time, value) {
  if (time.textContent === " /months") {
    value.textContent = Math.round(value.textContent / 30);
    time.textContent = " /days";
  } else {
    value.textContent = Math.round(value.textContent * 30);
    time.textContent = " /months";
  }
}

async function changeRate(rate, value) {
  const rates = await fetchExchangeRates();
  let price = +value.dataset.price;
  
  switch(rate.textContent) {
    case '$': {
      value.textContent = Math.round(price * rates['₽']);
      rate.textContent = "₽"
      break;
    }
    case '₽': {
      value.textContent = Math.round(price * rates['€']);
      rate.textContent = "€"
      break;
    }
    case '€': {
      value.textContent = Math.round(price);
      rate.textContent = "$";
      break;
    }
  }
}

cardTimes.forEach(cardTime => cardTime.addEventListener("click", () => changeCardPrices('time')));
cardRates.forEach(cardTime => cardTime.addEventListener("click", () => changeCardPrices('rate')));