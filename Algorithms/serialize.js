/**
 * Функция сериализации: преобразует массив целых чисел в строку
 * @param {array} numbers
 * @returns {string} Сериализованная строка
 */
const serialize = numbers => numbers.map(num => String.fromCharCode(num + 32)).join('');

/**
 * Функция десериализации: преобразует строку обратно в массив целых чисел
 * @param {string} serialized
 * @returns {array} Десериализованный массив
 */
const deserialize = serialized => Array.from(serialized).map(char => char.charCodeAt(0) - 32);

// Примеры тестов
const tests = [
  [1, 2, 3, 4, 5],
  [10, 20, 30, 40, 50],
  [100, 200, 300, 400, 500],
  [111, 222, 333, 444, 555],
];

tests.forEach(test => {
  const serialized = serialize(test);
  const deserialized = deserialize(serialized);
  const compressionRatio = serialized.length / (test.length * Math.ceil(Math.log10(Math.max(...test))));

  console.log(`Исходная строка: [${test.join(', ')}]`);
  console.log(`Сериализованная строка: ${serialized}`);
  console.log(`Десериализованная строка: [${deserialized.join(', ')}]`);
  console.log(`Коэффициент сжатия: ${compressionRatio.toFixed(2)}`);
})