import axios from 'axios';

const API_URL = 'https://dummyjson.com';

export const fetchRecipes = async (limit = 6, skip = 0) => {

  try {
    const response = await axios.get(`${API_URL}/recipes?limit=${limit}&skip=${skip}`);
    return response.data;
  } catch (error) {
    console.error('Error fetching recipes:', error);
    throw error;
  }
};

export const fetchAllRecipes = async () => {

  try {
    const response = await axios.get(`${API_URL}/recipes/search?q=`);
    return response.data;
  } catch (error) {
    console.error('Error fetching recipes:', error);
    throw error;
  }
};

export const fetchRecipe = async (id) => {

  try {
    const response = await axios.get(`${API_URL}/recipes/${id}`);
    return response.data;
  } catch (error) {
    console.error('Error fetching recipe:', error);
    throw error;
  }
};

export const fetchCuisines = () => {
  return axios.get(`${API_URL}/recipes?select=cuisine`)
    .then(response => {
      let recipes = response.data.recipes;
      return recipes
        .reduce((acc, recipe) => {
          if (!acc.includes(recipe.cuisine)) {
            acc.push(recipe.cuisine);
          }
          return acc;
        }, [])
        .sort();
    })
    .catch(error => {
      console.error('Error fetching cuisines:', error);
      throw error;
    });
} 

export const fetchMealTypes = async () => {
  try {
    const response = await axios.get(`${API_URL}/recipes?select=mealType`);
    let recipes = response.data.recipes;

    let mealTypes = recipes.reduce((acc, recipe) => {
      recipe.mealType.forEach(type => {
        if (!acc.includes(type)) {
          acc.push(type);
        }
      });
      return acc;
    }, []);

    return mealTypes.sort();
      
  } catch (error) {
    console.error('Error fetching meal types:', error);
    throw error;
  }
}
