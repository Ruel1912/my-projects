import { ObjectId } from "mongodb";
import clientPromise from "./mongodb";

let client;
let db;
let bonusCards;
let phones;
let orders;
let addresses;
let products;
let productFolders;

async function init() {
  if (db) return;
  try {
    client = await clientPromise;
    db = await client.db();

    products = db.collection("products");
    db.collection("products").createIndex({ name: "text", pathName: "text" })
    bonusCards = db.collection("bonuscards");
    phones = db.collection("phones");
    orders = db.collection("orders");
    addresses = db.collection("addresses");
    productFolders = db.collection("productFolders");
  } catch (error) {
    throw new Error("Gabella");
  }
}

(async () => {
  await init();
})();

//////////////////
/// BonusCards ///
//// vvvvvvvv ////

export const getBonusCards = async (userid) => {
  try {
    if (!bonusCards) await init();
    const result = await bonusCards.find({ userid: userid }).toArray();
    return { bonusCards: result };
  } catch (error) {
    return { error: "falled to fetch __name!" };
  }
};

//////////////
/// Phones ///
// vvvvvvvv //

export const getPhones = async (userid) => {
  try {
    if (!phones) await init();
    const result = await phones.find({ userid: userid }).toArray();
    return { phones: result };
  } catch (error) {
    return { error: "falled to fetch __name!" };
  }
};

//////////////
/// Orders ///
// vvvvvvvv //

export const getOrders = async (userid) => {
  try {
    if (!orders) await init();
    const result = await orders
      .find({ "activeAddress.userid": userid })
      .toArray();
    return { orders: result };
  } catch (error) {
    return { error: "falled to fetch __name!" };
  }
};

////////////////
/// OneOrder ///
///  vvvvvv  ///

export const getOneOrder = async (id) => {
  let filter = { _id: new ObjectId(id) };
  try {
    if (!orders) await init();
    const result = await orders.find(filter).toArray();
    return { orders: result };
  } catch (error) {
    return { error: "falled to getOneOrder!" };
  }
};

/////////////////
/// addresses ///
// vvvvvvvvvvv //

export const getAddresses = async (userid) => {
  try {
    if (!addresses) await init();
    const result = await addresses.find({ userid: userid }).toArray();
    return { addresses: result };
  } catch (error) {
    return { error: "falled to fetch __name!" };
  }
};

/////////////////
///  Product  ///
// vvvvvvvvvvv //

export const getPhotoProducts = async () => {
  try {
    if (!products) await init();
    const result = await products.find().toArray();
    return { products: result };
  } catch (error) {
    return { error: "falled to get products!" };
  }
};

export const getProductsFromDB = async (tab, offset, sort) => {
  try {
    if (!products) await init();
    // console.log(tab)
    const result = await products
      .find({ pathName: { $regex: tab }, stock: { $gt: 0 } })
      .sort(sort)
      .skip(Number(offset))
      .limit(10)
      .toArray();
    return { rows: result };
  } catch (error) {
    return { error: error.message };
  }
};
export const getOneProductsFromDB = async (id) => {
  try {
    if (!products) await init();
    const result = await products.find({ id: id }).toArray();
    return { rows: result };
  } catch (error) {
    return { error: error.message };
  }
};

export const getSearchProductsFromDB = async (text, offset) => {
  // text.replace('','\*')

  try {
    if (!products) await init();

    const regex = new RegExp(text, "i");

    const result = await products
      .find(
        { name: regex, stock: { $gt: 0 } },
      )
      .skip(Number(offset))
      .limit(10)
      .toArray();
    return { rows: result };
  } catch (error) {
    return { error: error.message };
  }
};

// Получить данные из API МойСклад
async function fetchFromMoySklad(endpoint) {
  const response = await fetch(`${process.env.API_MOYSKLAD_URI}/entity/${endpoint}`, {
    headers: {
      authorization: process.env.TOKEN_MYSKLAD,
      "Content-Type": "application/json",
    },
  });

  if (!response.ok) {
    throw new Error(`Ошибка API МойСклад: ${response.statusText}`);
  }

  return response.json();
}

// Загрузить категории (productFolders) в MongoDB
async function loadProductFolders() {
  console.log("Загружаем категории из МойСклад...");
  const { rows } = await fetchFromMoySklad("productfolder");
  let count = 0;

  const filteredFolders = rows.filter((folder) => folder.pathName?.includes("Ассортимент по категориям"));

  for (const folder of filteredFolders) {
    // Проверяем, содержит ли pathName "Ассортимент по категориям"
    if (folder.pathName) {
      await productFolders.updateOne(
        { id: folder.id }, // Условие поиска: категория с таким же id
        { $set: folder }, // Обновляем все данные категории
        { upsert: true } // Если категория не найдена, создаём новую запись
      );
      count++;
    }

  }

  console.log("Обновление категорий завершено. Обновлено категорий:", count);
}

// Обновить категории количеством товаров в каждой
async function updateProductFolderStock() {
  console.log("Обновляем категории количеством товаров...");

  const folders = await productFolders.find().toArray();
  let count = 0;
  for (const folder of folders) {
    const folderId = folder.id; // ID категории
    const assortmentEndpoint = `assortment?filter=productFolder=${folder.meta.href}&filter=stockMode=positiveOnly`;

    // Получаем ассортимент категории
    const { rows } = await fetchFromMoySklad(assortmentEndpoint);
    const stockCount = rows.length; // Количество товаров в категории

    // Обновляем категорию в MongoDB
    await productFolders.updateOne(
      { id: folderId },
      { $set: { hasProducts: stockCount > 0 } }
    );
    count++;
  }

  console.log("Обновление завершено. Обновлено категорий:", count);
}

export async function parseProductFolders() {
  try {
    if (!productFolders) await init();
    await loadProductFolders(); // Загрузка категорий
    await updateProductFolderStock(); // Обновление количества товаров
  } catch (error) {
    console.error("Ошибка при парсинге категорий:", error.message);
    throw error;
  }
}

export const getProductFolders = async (pathName) => {
  try {
    if (!productFolders) await init();
    const result = await productFolders
    .find({ pathName: pathName, hasProducts: true })
    .sort({ name: 1 })
    .toArray();
    return { productFolders: result };
  } catch (error) {
    return { error: error.message };
  }
}
