import axios from "axios";
import clientPromise from "./mongodb";
import { ObjectId } from "mongodb";

let client;
let db;
let bonusCards;
let phones;
let orders;
let addresses;
let products;

async function init() {
  if (db) return;
  try {
    client = await clientPromise;
    db = await client.db();

    products = db.collection("products");
    bonusCards = db.collection("bonuscards");
    phones = db.collection("phones");
    addresses = db.collection("addresses");
    orders = db.collection("orders");
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

export const postBonusCards = async (data) => {
  try {
    if (!bonusCards) await init();
    const result = await bonusCards.insertOne({
      userid: data.userid,
      promoCard: data.promoCard,
    });
    return { bonusCards: result };
  } catch (error) {
    return { error: "falled to fetch __name!" };
  }
};

//////////////
/// Phones ///
// vvvvvvvv //

export const postPhones = async (data) => {
  try {
    if (!phones) await init();
    const result = await phones.insertOne({
      userid: data.userid,
      phone: data.phone,
    });
    return { phones: result };
  } catch (error) {
    return { error: "falled to fetch __name!" };
  }
};

/////////////////
/// addresses ///
// vvvvvvvvvvv //

export const postAddresses = async (data) => {
  try {
    if (!addresses) await init();
    const result = await addresses.insertOne({
      userid: data.userid,
      address: data.address,
      apartment: data.apartment,
      porch: data.porch,
      floor: data.floor,
    });

    return { addresses: result };
  } catch (error) {
    return { error: "falled to fetch __name!" };
  }
};

////////////////
/// Products ///
// vvvvvvvvvv //

export const postProducts = async (data) => {
  try {
    const createTime = new Date();
    if (!products) await init();

    // Извлекаем все идентификаторы товаров из данных
    const productIds = data.rows.map((el) => el.id);

    // Проверяем наличие товаров с такими идентификаторами в базе данных
    const existingProducts = await products.find({ _id: { $in: productIds } }).toArray();

    if (existingProducts.length > 0) return { status: true, Products: existingProducts };

    // Если товаров нет, вставляем новые
    const result = await products.insertMany(
      data.rows.map((el) => ({ _id: el.id, createTime, ...el })),
      {
        ordered: false,
      },
    );

    return { Products: result };
  } catch (error) {
    return { error: error.message };
  }
};




//////////////
/// Orders ///
// vvvvvvvv //

const post_TG_ORDER = async (data, result_sklad, sum, time, day) => {

  if (!phones) await init();
  const ph = await phones
    .find({
      userid:
        data.activeAddress != null
          ? data.activeAddress.userid
          : data.activePickup.userid,
    })
    .toArray();

  if (!bonusCards) await init();

  const bc = await bonusCards
    .find({
      userid:
        data.activeAddress != null
          ? data.activeAddress.userid
          : data.activePickup.userid,
    })
    .toArray();

  const leadZero = (value) => value < 10 ? "0" + value : value;

  const now = new Date();
  const month = now.getMonth() + 1;
  const URL_API_MESSAGE = `https://api.telegram.org/bot6466921292:AAGagoV889I4xQprS8pETyVaxtAfOWyplOA/sendMessage`;
  const PAR_SUPPORT_CHAT_ID = "-1002146224218";

  let message = `------------------------------------------\n`;
  message += `${now.getFullYear()} —— ЗАКАЗ ПОКУПАТЕЛЯ —— ${leadZero(now.getDate())}.${leadZero(month)}\n`;
  message += `------------- —— ${leadZero(now.getHours())}:${leadZero(now.getMinutes())} —— -------------\n\n`;
  message += `<code>👤КЛИЕНТ:</code> <i>${data?.userName ?? 'Безымянный'}</i>\n`;
  message += `<code>📱НОМЕР:</code> <i>${ph[0]?.phone ?? 'Не известен'}</i>\n\n`;
  message += `<b>СОСТАВ ЗАКАЗА:</b>`;
  message += `<pre>`;
  message += result_sklad.positions.rows.map(
    (el, index) =>
      `${index !== 0 ? "\n\n" : ""}-${el.assortment.name}\n <b>Инфо:</b> ${el.assortment.salePrices[0].value / 100
      }₽ | ${el.quantity}шт`
  );
  message += `</pre>`;
  message += `<i>СУММА ЗАКАЗА:</i> - <b>${sum}₽</b>\n`;
  if (data.typeOrder === false) {
    message += `\n<code>🌐АДРЕС:</code>`;
    message += `\n<pre>${data.activeAddress.address}, ${data.activeAddress.porch} подъезд, ${data.activeAddress.floor} этаж, кв ${data.activeAddress.apartment}</pre>`;
  } else {
    message += `\n<code>🌐САМОВЫВОЗ:</code>`;
    message += `<pre>${data.activePickup.address}</pre>`;
  }
  // message += `Телеграм клиента - @\n`;
  message += `\n<code>ОПЛАТА:</code> -${data.payType == false
    ? data.cashValue === 0
      ? " Наличными, сдача не нужна"
      : " Наличными, сдача с " + data.cashValue + "р"
    : " Перевод"
    }\n`;
  message += `<code>ВРЕМЯ:</code> - ${time}\n\n`;
  message += `<code>🎟КОММЕНТАРИЙ:</code> - ${data?.comment ?? 'Отсутствует'}\n\n`;
  message += `<a href='https://online.moysklad.ru/app/#customerorder/edit?id=${result_sklad.id}'>🔗 ССЫЛКА НА ЗАКАЗ</a>`;

  axios.post(URL_API_MESSAGE, {
    chat_id: PAR_SUPPORT_CHAT_ID,
    parse_mode: "html",
    text: message,
    // reply_markup: {
    //   inline_keyboard: [
    //     [
    //       {
    //         text: "Отменить",
    //         callback_data: "btn_no",
    //       },
    //       {
    //         text: "Изменить",
    //         callback_data: "btn_reload",
    //       },
    //       {
    //         text: "Выполнен",
    //         callback_data: "btn_yes",
    //       },
    //     ],
    //   ],
    // },
  });
};

const post_SKLAD_ORDER = async (data) => {
  try {
    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");
    myHeaders.append("Authorization", process.env.TOKEN_MYSKLAD);
    if (!phones) await init();
    const ph = await phones
      .find({
        userid:
          data.activeAddress != null
            ? data.activeAddress.userid
            : data.activePickup.userid,
      })
      .toArray();

    const positions = data.prod.map((el) => ({
      assortment: {
        meta: {
          href: `${process.env.API_MOYSKLAD_URI}/entity/product/${el.id}`,
          metadataHref:
            `${process.env.API_MOYSKLAD_URI}/entity/product/metadata`,
          type: "product",
          mediaType: "application/json",
        },
      },
      price: el.price * 100,
      quantity: el.count,
    }));
    var raw = JSON.stringify({
      organization: {
        meta: {
          href: process.env.ORGANIZATION,
          type: "organization",
          mediaType: "application/json",
        },
      },
      agent: {
        meta: {
          href: process.env.AGENT,
          metadataHref:
            `${process.env.API_MOYSKLAD_URI}/entity/counterparty/metadata`,
          type: "counterparty",
          mediaType: "application/json",
          uuidHref:
            "https://online.moysklad.ru/app/#company/editid=2f3ff38a-4212-11eb-0a80-02b80019ede7",
        },
      },
      positions: positions,
      description: `Телефон: ${ph[0]?.phone} \nИмя: ${data.userName}\n ${data.typeOrder === false
        ? `Адрес: ${data.activeAddress.address}, ${data.activeAddress.porch} подъезд, кв ${data.activeAddress.apartment}, ${data.activeAddress.floor} этаж`
        : `Самовывоз: ${data.activePickup.address}`
        } ${data.comment != "" ? `\nКомментарий к заказу: ${data.comment}` : ""
        } `,
    });

    var requestOptions = {
      method: "POST",
      headers: myHeaders,
      body: raw,
      redirect: "follow",
    };

    return fetch(
      `${process.env.API_MOYSKLAD_URI}/entity/customerorder?action=evaluate_price&expand=positions.assortment,state,positions.assortment.images`,
      requestOptions
    )
      .then((response) => response.json())
      .then((result) => {
        return result;
      })
      .catch((error) => {
        console.log("error", error);
        throw error;
      });
  } catch (error) {
    return { error: "falled to post_SKLAD_ORDER!" };
  }
};

export const postOrders = async (data) => {
  const timePer = [
    { id: 1, time: "30 - 90 мин" },
    { id: 14, time: "14:00 - 15:00" },
    { id: 15, time: "15:00 - 16:00" },
    { id: 16, time: "16:00 - 17:00" },
    { id: 17, time: "17:00 - 18:00" },
    { id: 18, time: "18:00 - 19:00" },
    { id: 19, time: "19:00 - 20:00" },
    { id: 20, time: "20:00 - 21:00" },
    { id: 21, time: "21:00 - 22:00" },
    { id: 22, time: "22:00 - 23:00" },
  ];
  const now = new Date();
  const tomorrow = new Date(now.getTime() + 1000 * 60 * 60 * 24);
  const tomorrowAfter = new Date(now.getTime() + 1000 * 60 * 60 * 24 * 2);

  const dateDayNow =
    now.getDate() + "." + ((now.getMonth() + 1) % 12) + "." + now.getFullYear();
  const dateDayTomorrow =
    tomorrow.getDate() +
    "." +
    ((tomorrow.getMonth() + 1) % 12) +
    "." +
    now.getFullYear();
  const dateDayAfterTomorrow =
    tomorrowAfter.getDate() +
    "." +
    ((tomorrowAfter.getMonth() + 1) % 12) +
    "." +
    now.getFullYear();

  try {
    const result_sklad = await post_SKLAD_ORDER(data);
    if (result_sklad != null) {
      const sum = result_sklad.positions.rows
        .map((el) => (el.assortment.salePrices[0].value / 100) * el.quantity)
        .reduce(function (a, b) {
          return a + b;
        }, 0);

      if (!orders) await init();
      const time = timePer.find(
        (el) => el.id === data?.activeTimeId % 100
      ).time;
      const day =
        data.activeTimeId - 100 < 0
          ? dateDayNow
          : data.activeTimeId - 100 < 100 && data.activeTimeId - 100 >= 0
            ? dateDayTomorrow
            : dateDayAfterTomorrow;
      let ord;
      if (data.typeOrder == false) {
        ord = {
          type: "Доставка",
          state: "Активный",
          activeAddress: data.activeAddress,
          activeTimeId: `${time === "30 - 90 мин"
            ? `${now.getHours()}:${now.getMinutes()} (30 - 90 мин)`
            : time
            }`,
          activeDate: day,
          cashValue: data.cashValue,
          payType: data.payType,
          products: result_sklad.positions.rows,
          sum: sum,
          comment: data.comment,
        };
      }
      if (data.typeOrder == true) {
        ord = {
          type: "Самовывоз",
          state: "Активный",
          activeAddress: data.activePickup,
          activeTimeId: `${time === "30 - 90 мин"
            ? `${now.getHours()}:${now.getMinutes()} (30 - 90 мин)`
            : time
            }`,
          activeDate: day,
          cashValue: data.cashValue,
          payType: data.payType,
          products: result_sklad.positions.rows,
          sum: sum,
          comment: data.comment,
        };
      }
      const result = await orders.insertOne(ord);
      post_TG_ORDER(data, result_sklad, sum, time, day);
      return { orders: result };
    }
  } catch (error) {
    return { error: result_sklad };
  }
};
