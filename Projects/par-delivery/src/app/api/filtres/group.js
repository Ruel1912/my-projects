import { getProductFolders } from '@/app/database/get_modals';

const categories = {
  vape: `Ассортимент по категориям/Одноразовые электронные испарители`,
  liquid: `Ассортимент по категориям/Жидкости для POD-систем`,
  podSystem: `Ассортимент по категориям/POD-системы/Многоразовые POD-системы`,
  cartridge: `Ассортимент по категориям/POD-системы/Испарители и Картриджи`,

  tobacco: `Ассортимент по категориям/Табачная продукция/Табаки и смеси для кальяна/Табак для кальяна`,
  tobaccoMix: `Ассортимент по категориям/Табачная продукция/Табаки и смеси для кальяна/Бестабачные смеси для кальяна`,
  coal: `Ассортимент по категориям/Уголь для кальяна`,
  accessories: `Ассортимент по категориям/Аксессуары для кальяна`,

  snus: `Ассортимент по категориям/Табачная продукция/Табак жевательный`,
  snuf: `Ассортимент по категориям/Табачная продукция/Табак нюхательный`,
};

export const getGroup = async (tab) => {
  const categoryPath = categories[tab];
  if (!categoryPath) {
    console.error(`Категория с ключом "${tab}" не найдена.`);
    return [];
  }

  try {
    // Запрашиваем все подкатегории для выбранного пути
    const { productFolders } = await getProductFolders(categoryPath);

    if (!productFolders) {
      console.error('productFolders не нашли');
      return [];
    }

    return productFolders || [];
  } catch (error) {
    console.error(`Ошибка получения категорий: ${error.message}`);
    return [];
  }
};

export const getGroupName = async (tab, subCategory) => {
  const categoryPath = categories[tab];
  if (!categoryPath) {
    console.error(`Категория с ключом "${tab}" не найдена.`);
    return [];
  }

  try {
    // Формируем полный путь подкатегории
    const subCategoryPath = `${categoryPath}/${subCategory}`;

    const { productFolders } = await getProductFolders(subCategoryPath);

    if (!productFolders) {
      console.error('productFolders для подкатегорий не нашли');
      return [];
    }

    return productFolders || [];
  } catch (error) {
    console.error(`Ошибка получения подкатегорий: ${error.message}`);
    return [];
  }
};
