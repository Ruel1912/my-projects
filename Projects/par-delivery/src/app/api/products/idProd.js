export const getProductsIdProd = async (id) => {
  const response = await fetch(
    `${process.env.API_MOYSKLAD_URI}/entity/assortment/?filter=id=${id}&expand=images&limit=1&offset=0`,
    {
      headers: {
        authorization: process.env.TOKEN_MYSKLAD,
      },
    }
  );
  return response.json();
};
