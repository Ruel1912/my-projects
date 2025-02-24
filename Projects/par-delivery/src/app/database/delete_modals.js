import { ObjectId } from "mongodb";
import clientPromise from "./mongodb";

let client;
let db;
let bonusCards;
let phones;
let orders;
let addresses;

async function init() {
  if (db) return;
  try {
    client = await clientPromise;
    db = await client.db();

    bonusCards = db.collection("bonuscards");
    phones = db.collection("phones");
    orders = db.collection("orders");
    addresses = db.collection("addresses");
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

export const deleteBonusCards = async (userid) => {
  try {
    if (!bonusCards) await init();
    const result = await bonusCards.deleteOne({ userid: userid });
    return { bonusCards: result };
  } catch (error) {
    return { error: "falled to fetch __name!" };
  }
};

//////////////
/// Phones ///
// vvvvvvvv //

export const deletePhones = async (userid) => {
  try {
    if (!phones) await init();
    const result = await phones.deleteOne({ userid: userid });
    return { phones: result };
  } catch (error) {
    return { error: "falled to fetch __name!" };
  }
};

//////////////
/// Orders ///
// vvvvvvvv //

export const deleteOrders = async (id) => {
  try {
    if (!orders) await init();
    const result = await orders.deleteOne({ _id: new ObjectId(id) });
    return { orders: result };
  } catch (error) {
    return { error: "falled to fetch __name!" };
  }
};

/////////////////
/// addresses ///
// vvvvvvvvvvv //

export const deleteAddresses = async (id) => {
  try {
    if (!addresses) await init();
    const result = await addresses.deleteOne({ _id: new ObjectId(id) });
    return { addresses: result };
  } catch (error) {
    return { error: "falled to fetch __name!" };
  }
};
