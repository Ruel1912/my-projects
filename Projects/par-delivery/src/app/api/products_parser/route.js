import { postProducts } from "@/app/database/post_modals";
import { NextResponse } from "next/server";
import logToFile from '@/components/Logger/logToFile';

export async function POST(req) {
  const { searchParams } = new URL(req.url);
  const pass = searchParams.get("pass");
  const LOG_FILE = `product-parser.log`;

  try {
    if (pass !== 'aec3495c6678b37e84fd1c39b4ade73a82ce221d') {
      return NextResponse.json({ error: "Invalid pass" });
    }

    const limit = 100;
    let offset = 0;
    const category = `Ассортимент по категориям`;
    const URL_BASE = `${process.env.API_MOYSKLAD_URI}/entity/assortment/?filter=pathname~${category};&expand=images&limit=${limit}`;

    // Получаем первый набор данных, чтобы узнать общее количество товаров
    const firstResponse = await fetch(`${URL_BASE}&offset=${offset}`, {
      headers: {
        authorization: process.env.TOKEN_MYSKLAD,
      },
    });

    if (!firstResponse.ok) {
      throw new Error('Error fetching initial products data');
    }

    const firstData = await firstResponse.json();
    const totalItems = firstData.meta.size;
    const totalPages = Math.ceil(totalItems / limit);

    // logToFile(LOG_FILE, 'Start parsing products');
    console.log('Parser product start');

    // Парсинг всех страниц
    for (let page = 0; page < totalPages; page++) {
      const offset = page * limit;

      const nextPageResponse = await fetch(`${URL_BASE}&offset=${offset}`, {
        headers: {
          authorization: process.env.TOKEN_MYSKLAD,
        },
      });

      if (!nextPageResponse.ok) {
        throw new Error(`Error fetching products data for page ${page + 1}`);
      }

      const nextPageData = await nextPageResponse.json();
      
      // Сохраняем продукты на текущей странице
      const { error } = await postProducts(nextPageData);
      if (error) {
        throw new Error(error);
      }

      // Добавляем продукты в общий массив
      console.log(`Parsed page ${page + 1} of ${totalPages}`);
      // logToFile(LOG_FILE, `Parsed page ${page + 1} of ${totalPages}`);
    }

    // logToFile(LOG_FILE, 'End parsing products');
    console.log('End parsing products');
    return NextResponse.json({ message: 'OK' });

  } catch (error) {
    // logToFile(LOG_FILE, error.message);
    console.error(error.message);
    return NextResponse.json({ error: error.message });
  }
}
