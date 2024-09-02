import React, { useEffect, useState } from 'react';
import RecipesSearchComponent from '../components/RecipesSearch';
import RecipesComponent from '../components/recipe/Recipes';
import { Helmet } from 'react-helmet';
import { useParams } from 'react-router-dom';
import { fetchRecipes } from '../api/recipesApi';

function HomePage() {

  const [recipes, setRecipes] = useState([]);
  const [isFilterOpen, setIsFilterOpen] = useState(false);
  const { skip, limit } = useParams();

  const skipPage = skip || 0;
  const limitPage = limit || 6;

  useEffect(() => {
    localStorage.setItem('skip', skipPage);
    localStorage.setItem('limit', limitPage);

    if (!localStorage.getItem('total')) {
      localStorage.setItem('total', recipes.total)
    }
  }, [skipPage, limitPage, recipes]);

  useEffect(() => {
    const fetchRecipesData = async (limitPage, skipPage) => {
      try {
        const recipesData = await fetchRecipes(limitPage, skipPage);
        setRecipes(recipesData);
      } catch (error) {
        console.error(error);
      }
    };

    fetchRecipesData(limitPage, skipPage);
  }, [limitPage, skipPage]);

  const handleRecipes = (recipes) => {
    setRecipes(recipes);
  };

  const handleIsFilterOpen = (bool) => {
    setIsFilterOpen(bool)
  }

  return (
    <>
      <Helmet>
        <title>Список рецептов</title>
      </Helmet>
      <header>
        <h1>Сборник рецептов из разных стран мира</h1>
        <button  onClick={() => handleIsFilterOpen(!isFilterOpen)}><img src='/images/icon/filter.svg' alt='filter icon' title='filter'/></button>
      </header>
      <main>
        {recipes && <RecipesSearchComponent handleRecipes={handleRecipes} recipes={recipes} 
        handleIsFilterOpen={handleIsFilterOpen} filterOpen={isFilterOpen} />}
        {recipes && <RecipesComponent recipes={recipes} skipPage={skipPage} limitPage={limitPage} />}
      </main>
    </>
  );
}

export default HomePage; 