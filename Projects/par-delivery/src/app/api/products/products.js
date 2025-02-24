function getValueByKey(array, key) {
  return array[key];
}

export const getProducts = async (tab, offset, sort) => {
  const categories = {
    vape: `^Ассортимент по категориям/Одноразовые электронные`,
    liquid: `^Ассортимент по категориям/Жидкости для POD-систем`,
    podSystem: `^Ассортимент по категориям/POD-системы/Многоразовые`,
    cartridge: `^Ассортимент по категориям/POD-системы/Испарители и Картриджи`,

    tobacco: `^Ассортимент по категориям/Табачная продукция/Табаки и смеси для кальяна/Табак для кальяна`,
    tobaccoMix: `^Ассортимент по категориям/Табачная продукция/Табаки и смеси для кальяна/Бестабачные смеси для кальяна`,
    coal: `^Ассортимент по категориям/Уголь для кальяна`,
    accessories: `^Ассортимент по категориям/Аксессуары для кальяна`,

    snus: `^Ассортимент по категориям/Табачная продукция/Табак жевательный`,
    snuf: `^Ассортимент по категориям/Табачная продукция/Табак нюхательный`,
  };

  const key = tab;
  const value_old = getValueByKey(categories, key);
  const limit = "10";
  const URL = `${process.env.API_MOYSKLAD_URI}/entity/assortment/?filter=pathname~${value_old}&expand=images&limit=${limit}&offset=${offset}`;

  const response = await fetch(URL, {
    headers: {
      authorization: process.env.TOKEN_MYSKLAD,
    },
  });
  return response.json();
};