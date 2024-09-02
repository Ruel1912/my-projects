import RecipeCardComponent from './RecipeCard';
import RecipesPagination from './RecipesPagination';

function RecipesComponent({ recipes, skipPage, limitPage }) {
  let { recipes: recipesData, total } = recipes

  total = localStorage.getItem('filter-total') || total;
  
  if (!recipesData) {
    return (<p>Загрузка...</p>)
  } 

  return (
    <div className='recipes'>
      <div className='recipes-header'>
        <h2 className='recipes-header-title'>Найденные рецепты <span>{total}</span></h2>
      </div>
      <div className='recipes-body'>
        <div className='recipes-items'>
          {recipesData && recipesData.map((recipe, recipeKey) => recipeKey <= 5 && <RecipeCardComponent key={recipeKey} data={recipe} />)}
        </div>
        {total > 6 && <RecipesPagination total={total} skip={skipPage} limit={limitPage} />}
      </div>
    </div>
  );
}

export default RecipesComponent;