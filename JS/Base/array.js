const cars = ['Mazda', 'Ford', 'BMW', 'Mercedes'];
const people = [
    {name: 'Mikhail', salary: 5000},
    {name: 'Anton', salary: 6000},
    {name: 'Oleg', salary: 7000}
]
const fib = [1, 1, 2, 3, 5, 8, 13];

// Добавить в конец
cars.push('Toyota'); //['Mazda', 'Ford', 'BMW', 'Mercedes', 'Toyota']

// Добавить в начало
cars.unshift('Porsche'); //['Porsche', 'Mazda', 'Ford', 'BMW', 'Mercedes']

// Удалить первый элемент + записать в переменную
cars.shift(); //['Ford', 'BMW', 'Mercedes'] 'Mazda'

// Удалить крайний элемент + записать в переменную
cars.pop(); // ['Mazda', 'Ford', 'BMW'] 'Mercedes'

// Перевернуть массив
cars.reverse(); //['Mercedes', 'BMW', 'Ford', 'Mazda']


// Найти индекс элемента 
cars.indexOf('BMW'); // 2 || -1

// Найти индекс по условию в функции
people.findIndex(person => person.salary === 6000) // 1 || -1

// Найти элемент по условию в функции
people.find(person => person.salary === 6000) // {name: 'Anton', salary: 6000} || undefined

// Узнать существует ли данный элемент в массиве ? 
cars.includes('Mazda') // true || false



// Map - Из старого создаёт новый измененный массив 
// Верхний регистр
cars.map(car => car.toUpperCase()) // ['MERCEDES', 'BMW', 'FORD', 'MAZDA']
// Возведение в квадрат
fib.map(num => num ** 2) // [1, 1, 4, 9, 25, 64, 169]


// Filter - Из старого создаёт новый массив, созданный каким-то условием
// Исключить из массива числа меньше 5
fib.filter(num => num >= 5) // [5, 8, 13]


//Reduce - Позволяет объединять все значения массива в одно значение
// Просуммируем зарплату сотрудников, которые получают больше 5000

const a = people
    .filter(person => person.salary > 5000)
    .reduce((acc, person) => {
        acc += person.salary
        return acc
}, 0); // 13000 

console.log(a);