const person = {
    name: 'Mikhail',
    age: 17,
    isProgrammer: true,
    langauages: ['ru', 'en'],
    'complex key': 'Complex value',
    ['key_' + (1 + 3)]: 'Computed key',
    greet() {
        console.log('Greet from person');
    },
    info() {
        console.log('Информация про человека по имени:', this.name); //Контекст - this = person
    }
}

console.log(person.name);
console.log(person['age']);
console.log(person["complex key"]);
person.greet();

person.age++
person.langauages.push('by');

// Изменить значение
person['key_4'] = undefined;

// Удалить ключ
delete person['key_4']

// Деструктуризация
const {name, age: personAge = 10, langauages} = person // Ключ: значение = по умолчанию
console.log(name, personAge, langauages); // Mikhail 17 [ 'ru', 'en', 'by' ]

// Перебор ключей и значений по объекту
// Данный цикл лучше не использовать, 
// потому что цикл for (let in ) может пробегаться по методам его прототипа.
// Чтобы этого избежать необходимо использовать условие if (object.hasOwnProperty(key)) {}
for (let key in person) {
    if (person.hasOwnProperty(key)) {
        console.log('Key:', key);
        console.log('Value:', person[key]);
    } 
    
}

// Новый способ перебора объекта
Object.keys(person) // Массив ключей [ 'name', 'age', 'isProgrammer', 'langauages', 'complex key', 'greet' ]
    .forEach(key => {
        console.log('Key:', key);
        console.log('Value:', person[key]);
}); 

const logger = {
    keys() {
        console.log(Object.keys(this));
    },
    keysAndValues() {
        Object.keys(this).forEach(key => {
            console.log(`"${key}": ${this[key]}`);
        });
    },

    withParams(top = false, between = false, bottom = false) {
        if (top) {
            console.log('--------- Start ---------');
        }
        Object.keys(this).forEach((key, index, array) => {
            console.log(`"${key}": ${this[key]}`);
            if (between && index !== array.length - 1){
                console.log('----------------------');
            }
        });
        if (bottom) {
            console.log('--------- End ---------');
        }
    }
}

// bind - привязка контекста, (this = person) возвращает функцию
// Функция f предназначена для вывода ключей объекта
const f = logger.keys.bind(person)
f();

// call - В отличии от bind, сразу вызывает функцию, нет ограничений на параметры
logger.withParams.call(person, true, true, true)


// apply - В отличии от call, принимает только 2 параметра (obj, [param into method])
// [true, true, true] - это парметры метода withParams
logger.withParams.apply(person, [true, true, true])