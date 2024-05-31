export const filterRecipes = (recipes, cuisineFilter, mealTypeFilter, difficultyFilter) => {
  return recipes.filter(item => {
    if (
      (cuisineFilter !== 'all' && item.cuisine !== cuisineFilter) ||
      (mealTypeFilter !== 'all' && !item.mealType.includes(mealTypeFilter)) ||
      (difficultyFilter !== 'all' && item.difficulty !== difficultyFilter)
    ) {
      return false;
    }
    return true;
  });
};