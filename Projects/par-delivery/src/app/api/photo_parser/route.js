import { NextResponse } from "next/server";
import { getPhotoProducts } from "@/app/database/get_modals";
import logToFile from '@/components/Logger/logToFile';
import CloudStorage from '../cloud/CloudStorage';
import FileProcessor from '../cloud/FileProcessor';

export async function POST(req) {
  const { searchParams } = new URL(req.url);
  const pass = searchParams.get("pass");
  const LOG_FILE = `photo-parser.log`;

  if (pass !== 'aec3495c6678b37e84fd1c39b4ade73a82ce221d') {
    logToFile(LOG_FILE, 'Invalid pass attempt');
    return NextResponse.json({ error: "Invalid pass" });
  }

  console.log(`${new Date().toISOString()} - Starting photo sync`);
  // logToFile(LOG_FILE, 'Starting photo sync');

  try {
    const Arr = await getPhotoProducts();
    const photoLinks = Arr.products.filter(el => el.images?.rows[0]?.meta?.downloadHref).map((el) => ({
      link: el.images?.rows[0]?.meta?.downloadHref,
      name: el.id,
      dir: el.pathName,
    }));

    let totalPhotos = photoLinks.length;  // Общее количество фотографий
    console.log('Total photos: ', totalPhotos);

    const cloudStorage = new CloudStorage();
    const fileProcessor = new FileProcessor(cloudStorage);
    const bucketName = process.env.CLOUD_BACKET_NAME;

    await fileProcessor.processFiles(photoLinks, bucketName);
    console.log(`${new Date().toISOString()} - Finish parser`);
    return NextResponse.json({
      good: "ОК",
      totalPhotos,
    });
  } catch (error) {
    return NextResponse.json({ error: `Ошибка при синхронизации фотографий: ${error.message}` });
  }
}