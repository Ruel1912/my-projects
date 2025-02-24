import { ObjectId } from "mongodb";
import clientPromise from "./mongodb";

let client;
let db;
let bonusCards;
let phones;
let orders;
let addresses;
let products;
let users;

async function init() {
  if (db) return;
  try {
    client = await clientPromise;
    db = await client.db();
    products = db.collection("products");
    bonusCards = db.collection("bonuscards");
    phones = db.collection("phones");
    addresses = db.collection("addresses");
    users = db.collection("users");

    orders = db.collection("orders");
  } catch (error) {
    throw new Error("Gabella");
  }
}

(async () => {
  await init();
})();

/////////////////
/// addresses ///
// vvvvvvvvvvv //

export const patchAddresses = async (data) => {
  let id = data.id;
  let filter = { _id: new ObjectId(id) };
  try {
    if (!addresses) await init();

    const options = { upsert: true };
    const result = await addresses.updateOne(
      filter,
      {
        $set: {
          userid: data.userid,
          address: data.address,
          apartment: data.apartment,
          porch: data.porch,
          floor: data.floor,
        },
      },
      options
    );
    return { addresses: result };
  } catch (error) {
    return { error: error };
  }
};

export const patchProfile = async (data) => {
  let id = data.userId;
  let filter = { _id: new ObjectId(id) };
  try {
    if (!users) await init();

    const options = { upsert: true };
    const result = await users.updateOne(
      filter,
      {
        $set: {
          name: data.userName,
        },
      },
      options
    );
    return { profile: result };
  } catch (error) {
    return { error: error };
  }
};

/////////////////
/// Products  ///
// vvvvvvvvvvv //

export const patchProducts = async (data) => {
  try {
    const createTime = new Date();
    if (!products) await init();
    const result = await data.rows.map((el) =>
      products.updateOne(
        {
          _id: el.id,
        },
        {
          $set: {
            images: el.images,
            volume: el.volume,
            stock: el.stock,
            quantity: el.quantity,
            updated: createTime,
          },
        }
      )
    );
    return { Products: result };
  } catch (error) {
    return { error: error };
  }
};
