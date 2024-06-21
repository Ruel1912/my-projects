// Типы данных
const a: number = 5;
const b: string = "Текст";
const c: boolean = true;
const d: number[] = [1, 2, 3];
const e: string[] = ['Я', 'строковый', 'массив'];
const f: undefined = undefined;
const g: null = null;

const print1 = function(a:number):number {
  return a;
} 

const print2 = (a: number): number => {
  return a;
} 

function print3(a: number): number {
  return a;
} 

function print4(a: number): void { // При использовании void функция ничего не возвращает
  console.log(a);
}


// Переменная может иметь несколько типов данных
const h: number | string = 2; 
const о: number | string = "o";

// Чтобы проверить какой тип данных лежит в переменной можно воспользоваться следующими функциями:

// typeof, для проверки на любой тип данных, пример  if (typeof a === 'number') {}

// Если переменная массив, то проверить это можно следующим образом:
//    if (Array.isArray(a)) {}