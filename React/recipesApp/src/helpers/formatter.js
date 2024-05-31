export function getTotalCookieTime(prevTime, cookieTime) {
  return prevTime + cookieTime;
}

export function DifficultStars({ difficult }) {

  const emptyStarPath = '/images/icon/empty_star.svg';
  const fillStarPath = '/images/icon/fill_star.svg';
  const maxDifficult = 3;

  const difficultTransform = {
    easy: 1, medium: 2, hard: 3,
  };

  let difficultNumber = difficultTransform[difficult && difficult.toLowerCase()];

  return (
    <div className="stars">
      {Array.from({ length: maxDifficult }).map((_, index) => (
        <img key={index} src={index < difficultNumber ? fillStarPath : emptyStarPath} alt="star icon" />
      ))}
    </div>
  );
}

export function RecipeTags({ tags }) {
  return (
    <div className="recipe-tags">
     {Array.from(tags).map((tag, index) => (
      <span key={index} className="recipe-tag secondary-text">#{ tag }</span>
     ))}
    </div>
  )
}

export function getCuisine(cuisine) {
  const cuisineTransform = {
    italian: 'Итальянская',
    asian: 'Азиатская',
    american: 'Американская',
    mexican: 'Мексиканская',
    mediterranean: 'Средиземноморская',
    pakistani: 'Пакистанская',
    japanese: 'Японская',
    moroccan: 'Марокканская ',
    korean: 'Корейская',
    greek: 'Греческая',
    thai: 'Тайская',
    indian: 'Индийская',
    turkish: 'Турецкая',
    smoothie: 'Смузи',
    russian: 'Русская',
    lebanese: 'Ливанская',
    brazilian: 'Бразильская',
    spanish: 'Испанская',
    vietnamese : 'Вьетнамская',
    hawaiian: 'Гавайская',
  };

  return cuisineTransform[cuisine && cuisine.toLowerCase()] || cuisine;
}

const mealTyoeTransform = {
  breakfast: 'Завтрак',
  beverage: 'Напиток',
  lunch: 'Обед',
  dinner: 'Ужин',
  snack: 'Закуска',
  snacks: 'Закуски',
  dessert: 'Сладкое',
  appetizer: 'Аперитив',
  'side dish': 'Гарнир',
}

export function getMealTypes(mealTypes) {
  return mealTypes.map(mealType => mealType = mealTyoeTransform[mealType && mealType.toLowerCase()] || mealType ).join(', ');
}

export function getMealType(mealType) {
  return mealTyoeTransform[mealType && mealType.toLowerCase()] || mealType;
}