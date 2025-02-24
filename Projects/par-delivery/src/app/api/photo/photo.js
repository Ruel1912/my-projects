export const getPhoto = async (link) => {
  const response = await fetch(link,
    {
      headers: {
        authorization: process.env.TOKEN_MYSKLAD,
      },
    }
  )
  return response.url;
  
};
