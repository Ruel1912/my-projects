// Параметр n замкнут внутри функции createCalc. 
// Поэтому функцию calc вызываем без параметра n, данный феномен называется замыканием
const createCalc = n => {
    return () => console.log(1000 * n);
}

const calc = createCalc(42);
calc();




const createIncrementor = n => {
    return num => n + num;
}

const addOne = createIncrementor(1);
console.log(addOne(10));




const urlGenerator = domain => {
    return url => `https://${url}.${domain}`;
}

const comUrl = urlGenerator('com');
console.log(comUrl('google'));

const ruUrl = urlGenerator('ru');
console.log(ruUrl('vk'));

const bind = (obj, fn) => {
    return (...args) => {
        fn.apply(obj, args)

    }
}