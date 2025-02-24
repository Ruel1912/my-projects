// Таймаут(callback, wait) - один раз через 3 секунды
const timeout = setTimeout(() => { 
    console.log('Start timeout');
}, 3000);

//Удалить таймаут(переменная таймаута)
clearTimeout(timeout);

// Интервал(callback, wait) - постоянно через 3 секунды
const interval = setInterval(() => { 
    console.log('Start interval');
}, 3000);

//Удалить интервал(переменная интервала)
clearInterval(interval);


// Без промиссов
// const delay = (callback, wait = 1000) => {
//     setTimeout(callback, wait);
// }

// delay(() => {
//     console.log('After 2 seconds');
// }, 2000)

// С промиссами
// const promise = new Promise((resolve, reject) => {})
// resolve - разрешать, cрабатывает при успешном выполнении кода reject - отклонять, для ошибки

const delayP = (wait = 1000) => {
    const promise = new Promise((resolve, reject) => {
        setTimeout(() => {
            // resolve()
            reject('Что-то пошло не так. Повторите попытку')
        }, wait);
    })
    return promise
}

// После вызова прописываем .then(callback) - успешно, .catch(callback) - ошибка, .finally(callback) - в самом конце(редко используется);
// delayP(2000)
//     .then(() => console.log('After 2 seconds'))
//     .catch(err => console.error('Error', err))
//     .finally(() => console.log('Finally'))

//Краткая запись промиса
const getData = () => new Promise(resolve => resolve([
    1, 1, 2, 3, 5, 8, 13
]))

// getData().then(data => console.log(data));

// Новая технология записи промисов
//Обязательно функция должна быть async и чтобы функция внутри сработала корректно, необходимо прописать await
async function asyncExample() {
// Блок try выполнится при успешной работе кода (resolve), catch при ошибке и получит аргумент из reject
    try {
        await delayP(3000)
        const data = await getData()
        console.log('Data', data);
    } catch (e) {
        console.log(e);
    }
    
}

asyncExample();