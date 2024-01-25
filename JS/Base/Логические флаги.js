// Задание 1
// Проверьте, что в этом массиве есть элемент 'c'. Если есть - выведите '+++', а если нет - выведите '---'.
let arr = ['a', 'b', 'c', 'd', 'e'];
let isCInArr = false;


for (let elem of arr) {
  if (elem === "c") {
    isCInArr = true;
    break;
  }
}

console.log(isCInArr ? '+++' : '---');

// Задание 2
// Напишите код, который будет проверять число на то, простое оно или нет. Простое число делится только на единицу и на само себя, и не делится на другие числа.
let simpleNumber = 13;
let isNotSimpleNumber = false;

for (let i = 2; i < simpleNumber; i++) {
  if (simpleNumber % i === 0) {
    isNotSimpleNumber = true;
    break;
  }
}

console.log(isNotSimpleNumber ? 'Непростое число' : 'Простое число');