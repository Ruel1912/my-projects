const axios = require('axios');
const path = require('path'); // Для работы с путями и расширениями

class FileProcessor {

    constructor(storage) {
        this.storage = storage;
    }

    // Метод для обработки массива объектов
    async processFiles(files, bucketName) {
        let i = 1; // Инициализируем счётчик перед циклом
        for (const file of files) {
            try {
                console.log(`N${i}. ${new Date().toISOString()} - Загружаю файл: ${file.name}`);

                // Загрузка файла по ссылке
                const response = await axios.get(file.link, {
                    responseType: 'arraybuffer',
                    headers: {
                        Authorization: process.env.TOKEN_MYSKLAD,
                    },
                });

                // Проверка успешности запроса
                if (response.status !== 200) {
                    throw new Error(`Ошибка загрузки файла: ${response.status} ${response.statusText}`);
                }

                const fileContent = response.data;

                // Получаем MIME-тип файла из заголовков
                const contentType = response.headers['content-type'];

                // Определяем расширение файла на основе MIME-типа
                const extension = this.getFileExtension(contentType);

                // Определяем реальное имя файла и путь (заменяем обратные слеши на прямые)
                const dirPath = file.dir.replace(/\\/g, '/'); // Преобразование в корректный путь
                const fileNameWithExtension = `${file.name}.${extension}`;
                const fullPath = `${dirPath}/${fileNameWithExtension}`; // Путь в бакете

                // Загрузка файла в облако в указанную папку (dir)
                setTimeout(async () => {  
                    await this.storage.uploadFile(bucketName, fullPath, fileContent);
                    console.log(`${new Date().toISOString()} - Успешная загрузка файла ${dirPath}/${fileNameWithExtension}`);
                }, 1000)

                
            } catch (error) {
                console.error(`Ошибка при обработке файла ${file.name}:`, error.message);
            }
            i++; // Увеличиваем счётчик после успешной загрузки
        }
    }


    // Метод для получения расширения файла на основе MIME-типа
    getFileExtension(mimeType) {
        switch (mimeType) {
            case 'image/jpeg':
                return 'jpg';
            case 'image/png':
                return 'png';
            case 'image/gif':
                return 'gif';
            case 'application/pdf':
                return 'pdf';
            // Добавьте другие MIME-типы при необходимости
            default:
                return 'bin'; // Для неизвестных типов, можно использовать бинарное расширение
        }
    }
}

module.exports = FileProcessor;