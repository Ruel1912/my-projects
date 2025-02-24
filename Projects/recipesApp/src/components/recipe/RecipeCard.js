import React from 'react';
import { getTotalCookieTime, DifficultStars, getCuisine, getMealTypes } from '../../helpers/formatter';
import { Link } from 'react-router-dom';

function RecipeCardComponent({data}) {
  return (
    <div className='recipe-item'>
     
      <div className='recipe-left'>
        <h3 className='recipe-title'> <Link to={`/recipe/${data.id}`} className="recipe-link">{data.name}</Link></h3>
        <div className='recipe-image'>
          <img src={ data.image || '/images/recipe_placeholder.svg'} alt='recipe_image' />
        </div>
      </div>
      <div className='recipe-right'>
        <p className='recipe-desc secondary-text'>{Array.from(data.instructions).join(' ')}</p>
        <div className='recipe-row recipe-time'>
          <img src='/images/icon/time.svg' alt='time icon' />
          <span>{ getTotalCookieTime(data.prepTimeMinutes, data.cookTimeMinutes) } минут</span>
        </div>
        <div className='recipe-row recipe-difficult'>Сложность: { <DifficultStars difficult={data.difficulty} />  }</div>
        <div className='recipe-row recipe-cuisine'>{ getCuisine(data.cuisine) } кухня</div>
        <div className='recipe-row recipe-mealType'>{getMealTypes(data.mealType) }</div>
      </div>
    </div>
  );
}

export default RecipeCardComponent; 