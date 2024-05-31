import React, { useEffect, useState } from 'react';
import RadioButtonGroup from './RadioButtonGroup';
import Dropdown from './Dropdown';
import { fetchRecipes } from '../../api/recipesApi';
import { filterRecipes } from '../../helpers/filterRecipes';

const FilterForm = ({ cuisines, mealTypes, difficultButtons, handleRecipes }) => {
  const [selectedCuisine, setSelectedCuisine] = useState('all');
  const [selectedMealType, setSelectedMealType] = useState('all');
  const [allRecipes, setAllRecipes] = useState(null);
  const [selectedDifficulty, setSelectedDifficulty] = useState(difficultButtons.find(option => option.isActive).value);

  useEffect(() => {
    const fetchAllRecipesData = async () => {
      try {
        const recipesData = await fetchRecipes(1000, 0);
        setAllRecipes(recipesData);
      } catch (error) {
        console.error(error);
      }
    };

    !allRecipes && fetchAllRecipesData();

  }, [allRecipes]);

  const handleCuisineChange = (option) => {
    option = option === 'Все страны и регионы' ? 'all' : option;
    setSelectedCuisine(option);
    handleSubmit(option, selectedMealType, selectedDifficulty);
  }

  const handleMealTypeChange = (option) => {
    option = option === 'Все типы' ? 'all' : option;
    setSelectedMealType(option);
    handleSubmit(selectedCuisine, option, selectedDifficulty);
  };

  const handleDifficultyChange = (option) => {
    setSelectedDifficulty(option.value);
    handleSubmit(selectedCuisine, selectedMealType, option.value);
  };

  const handleReset = () => {
    setSelectedCuisine('all');
    setSelectedMealType('all');
    setSelectedDifficulty(difficultButtons.find(option => option.value === 'all').value);
    localStorage.setItem('filter-total', allRecipes.total);
    handleSubmit('all', 'all', 'all');
  }

  const handleSubmit = async (selectedCuisine, selectedMealType, selectedDifficulty) => {
    const filteredRecipes = filterRecipes(allRecipes.recipes, selectedCuisine, selectedMealType, selectedDifficulty);
    
    let data = {
      recipes: filteredRecipes,
      total: filteredRecipes.length,
      skip: 0,
      limit: 6,
    }

    localStorage.setItem('filter-total', data.total);

    handleRecipes(data);
  };

  return (
    <form className='recipes-search-body' onSubmit={handleSubmit}>
      <div className='form-row'>
        <label>Кухня:</label>
        {cuisines && <Dropdown title="Все страны и регионы" options={cuisines} name='cuisine' handleSelect={handleCuisineChange} />}
      </div>
      <div className='form-row'>
        <label>Тип блюда:</label>
        {mealTypes && <Dropdown title="Все типы" options={mealTypes} name='meal-type' handleSelect={handleMealTypeChange} />}
      </div>
      <div className='form-row'>
        <label>Сложность приготовления:</label>
        <RadioButtonGroup options={difficultButtons} handleDifficultyChange={handleDifficultyChange} selected={selectedDifficulty} />
      </div>
      <div className='form-row'>
        <button className='form-reset' type='button' onClick={handleReset}>Сбросить все фильтры</button>
      </div>
    </form>
  );
};

export default FilterForm;
