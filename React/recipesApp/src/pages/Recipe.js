import React, { useEffect, useState } from 'react';
import { Link, useParams } from 'react-router-dom';
import { fetchRecipe } from '../api/recipesApi';
import { Helmet } from 'react-helmet';
import { RecipeTags, getCuisine, getTotalCookieTime } from '../helpers/formatter';

function Recipe() {
  const { id } = useParams();
  const skip = parseInt(localStorage.getItem('skip')) || 0;
  const limit = parseInt(localStorage.getItem('limit')) || 6;

  const [recipe, setRecipe] = useState({});

  useEffect(() => {
    const fetchRecipeData = async () => {
      try {
        const recipesData = await fetchRecipe(id);
        setRecipe(recipesData);
      } catch (error) {
        console.error(error);
      }
    };

    fetchRecipeData();
  }, [id]);

  if (!recipe) return null;

  return (
    <>
      <Helmet>
        <title>{recipe.name}</title>
      </Helmet>
      <header>
        <Link to={skip === 0 ? '/' : `/recipes/${skip}/${limit}`}><img src='/images/icon/arrow_left.svg' title='back' alt='back' /></Link>
        <h1>{recipe.name}</h1>
      </header>
      <main className='recipe-main'>
        <div className='recipe-info'>
          <div className='recipe-info-col'>
            <div className='recipe-info-block'>
              <h2 className='recipe-info-title'>Кухня</h2>
              <div className='recipe-info-content'>{getCuisine(recipe.cuisine)}</div>
            </div>
            <div className='recipe-info-block'>
              <h2 className='recipe-info-title'>Теги</h2>
              <div className='recipe-info-content'><RecipeTags tags={recipe.tags || []} /></div>
            </div>
            <div className='recipe-info-block'>
              <h2 className='recipe-info-title'>Калорийность</h2>
              <div className='recipe-info-content'>
                <p>{recipe.caloriesPerServing} ккал</p>
                <p className='secondary-text'>100 грамм</p>
              </div>
            </div>
            <div className='recipe-info-block'>
              <h2 className='recipe-info-title'>Количество порций</h2>
              <div className='recipe-info-content large-bold-text'>{recipe.servings}</div>
            </div>
            <div className='recipe-info-block'>
              <h2 className='recipe-info-title'>Описание</h2>
              <div className='recipe-info-content secondary-text'>{recipe.instructions && Array.from(recipe.instructions).join(' ')}</div>
            </div>
          </div>
          <div className='recipe-info-col'>
            <div className='recipe-info-block'>
              <h2 className='recipe-info-title'>Общее время приготовления</h2>
              <div className='recipe-info-content'>{getTotalCookieTime(recipe.prepTimeMinutes, recipe.cookTimeMinutes)} минут</div>
            </div>
            <div className='recipe-info-block recipe-info-block_instructions'>
              <h2 className='recipe-info-title'>Инстуркции по приготовлению</h2>
              <div className='recipe-info-content'>
                <ul className='recipe-instructions'>
                  {recipe.instructions && recipe.instructions.map((inst, key) => (<li key={key}><p>{inst}</p></li>))}
                </ul>
              </div>

            </div>
          </div>
        </div>
        <div className='recipe-block-image'><img src={recipe.image} alt="recipe" /></div>
      </main>
    </>
  );
}

export default Recipe; 