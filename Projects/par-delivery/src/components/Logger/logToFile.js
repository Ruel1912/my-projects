import fs from "fs";
import path from "path";

// Создание директории, если она не существует
const ensureDirExists = (dir) => {
    if (!fs.existsSync(dir)) {
        fs.mkdirSync(dir, { recursive: true });
    }
};

// Запись сообщения в лог-файл
const logToFile = (filename, message) => {
    // Определение пути к директории и файлу логов в текущей рабочей директории
    const LOG_DIR = path.join(process.cwd(), 'logs');
    const LOG_FILE = path.join(LOG_DIR, filename);
    
    ensureDirExists(LOG_DIR);
    
    try {
        fs.appendFileSync(LOG_FILE, `${new Date().toISOString()} - ${message}\n`);
    } catch (error) {
        console.error(`Failed to write to log file: ${error.message}`);
    }
};

export default logToFile;
