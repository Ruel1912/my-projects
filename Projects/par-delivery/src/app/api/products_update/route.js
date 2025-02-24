import { patchProducts } from "@/app/database/patch_modals";
import { NextResponse } from "next/server";
import logToFile from '@/components/Logger/logToFile';

export async function POST(req) {
  const { searchParams } = new URL(req.url);
  const pass = searchParams.get("pass");
  const LOG_FILE = `product-update.log`;

  try {
    if (pass !== 'aec3495c6678b37e84fd1c39b4ade73a82ce221d') {
      return NextResponse.json({ error: "Invalid pass" });
    }

    const limit = 100;
    const category = `Ассортимент по категориям`;
    let offset = 0;

    const URL_NEW = `${process.env.API_MOYSKLAD_URI}/entity/assortment/?filter=pathname~${category};&expand=images&limit=${limit}&offset=${offset}`;

    const response = await fetch(URL_NEW, {
      headers: {
        authorization: process.env.TOKEN_MYSKLAD,
      },
    });

    if (!response.ok) {
      throw new Error(`Ошибка при получении данных: ${response.statusText}`);
    }

    const data = await response.json();
    const totalItems = data.meta.size;
    const totalPages = Math.ceil(totalItems / limit);

    console.log(`Начато обновление продуктов. Всего страниц: ${totalPages}`);

    for (let page = 0; page < totalPages; page++) {
      const currentOffset = page * limit;
      const nextPageResponse = await fetch(
        `${process.env.API_MOYSKLAD_URI}/entity/assortment/?filter=pathname~${category};&expand=images&limit=${limit}&offset=${currentOffset}`,
        {
          headers: {
            authorization: process.env.TOKEN_MYSKLAD,
          },
        }
      );

      if (!nextPageResponse.ok) {
        console.log(`Ошибка при получении данных на странице ${page + 1}: ${nextPageResponse.statusText}`);
        continue;
      }

      const nextPageData = await nextPageResponse.json();

      // Обрабатываем обновление продуктов
      const { error } = await patchProducts(nextPageData);

      if (error) {
        console.log(`Ошибка при обновлении продуктов на странице ${page + 1}: ${error}`);
      } else {
        console.log(`Обновление продуктов на странице ${page + 1} завершено успешно`);
      }
    }

    console.log(`Обновление продуктов завершено`);
    return NextResponse.json({ message: 'OK' });

  } catch (error) {
    console.log(`Ошибка: ${error.message}`);
    return NextResponse.json({ error: error.message });
  }
}
