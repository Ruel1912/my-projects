import { NextResponse } from "next/server";

import {
  getOneProductsFromDB,
  getProductsFromDB,
  getSearchProductsFromDB,
} from "@/app/database/get_modals";

function getValueByKey(array, key) {
  return array[key];
}
export async function GET(req) {
  
  const categoriesOld = {
    vape: `^Ассортимент по категориям/Одноразовые электронные`,
    liquid: `^Ассортимент по категориям/Жидкости для POD-систем`,
    podSystem: `^Ассортимент по категориям/POD-системы/Многоразовые`,
    cartridge: `^Ассортимент по категориям/POD-системы/Испарители и Картриджи`,

    // Табачная продукция/Табаки и смеси для кальяна/Бестабачные смеси для кальяна
    // Табачная продукция/Табаки и смеси для кальяна/Бестабачные смеси для кальяна
    // Табачная продукция/Табаки и смеси для кальяна/Табак для кальяна
    tobacco:
      `^Ассортимент по категориям/Табачная продукция/Табаки и смеси для кальяна/Табак для кальяна`,
    tobaccoMix:
      `^Ассортимент по категориям/Табачная продукция/Табаки и смеси для кальяна/Бестабачные смеси для кальяна`,
    coal: `^Ассортимент по категориям/Уголь для кальяна`,
    accessories: `^Ассортимент по категориям/Аксессуары для кальяна`,

    snus: `^Ассортимент по категориям/Табачная продукция/Табак жевательный`,
    snuf: `^Ассортимент по категориям/Табачная продукция/Табак нюхательный`,
  };
  const sort_type = {
    "По умолчанию": { "images.rows": -1 },
    Дороже: { "salePrices.value": -1 },
    Дешевле: { "salePrices.value": 1 },
    Новинки: { createTime: -1 },
  };
  const { searchParams } = new URL(req.url);
  
  const tab = searchParams.get("tab");
  const path = searchParams.get("path");
  const sort = searchParams.get("sort");

  const find = searchParams.get("find");
  const offset = searchParams.get("offset");
  const id = searchParams.get("id");
  let data;
  if (tab) {
    // Главная
    const s = getValueByKey(sort_type, sort);
    const value = getValueByKey(categoriesOld, tab);
    data = await getProductsFromDB(value, offset, s);
  }

  if (path) {
    // Для фильтров
    const s = getValueByKey(sort_type, sort);
    var re = /1|2|3|4|5|6|7|8|9|0|(|)\*/gi;
    data = await getProductsFromDB("^"+path.replace(re,""), offset, s);
  }

  if (find) {
    //Для поиска
    data = await getSearchProductsFromDB(find, offset);
  }
  if (id) {
    //Для лайков
    data = await getOneProductsFromDB(id);
  }

  return NextResponse.json({ data });
}
