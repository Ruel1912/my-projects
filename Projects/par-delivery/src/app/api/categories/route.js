import { parseProductFolders } from '@/app/database/get_modals';
import { NextResponse } from "next/server";
import logToFile from '@/components/Logger/logToFile';

// POST-запрос для запуска парсинга категорий
export async function POST(req) {
  const { searchParams } = new URL(req.url);
  const pass = searchParams.get("pass");
  const LOG_FILE = `categories-parser.log`;

  if (pass !== 'aec3495c6678b37e84fd1c39b4ade73a82ce221d') {
    logToFile(LOG_FILE, 'Invalid pass attempt');
    return NextResponse.json({ error: "Invalid pass" });
  }

  try {
    // Вызов функции парсинга
    await parseProductFolders();

    // Успешный ответ
    logToFile(LOG_FILE, 'Categories parsed successfully');
    return NextResponse.json({ success: true, message: "Категории успешно обновлены." });
  } catch (error) {
    // Логируем ошибку и возвращаем ответ с ошибкой
    logToFile(LOG_FILE, `Error parsing categories: ${error.message}`);
    console.error("Ошибка при парсинге категорий:", error.message);
    return NextResponse.json(
      { success: false, message: "Не удалось обновить категории.", error: error.message },
      { status: 500 }
    );
  }
}
