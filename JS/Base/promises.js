/**
 * Промисы - позволяют обрабатывать отложенные во времени события.
 * Это обещание предоставить результат позже.
 * Промис может вернуть ошибку если результат предоставить невозможно
 *
 * Состояния промиса:
 *  1. Ожидание (Pending)
 *  2. Исполнен (Success)
 *  3. Отклонен (Error)
 *
 */

const myPromise = new Promise((resolve, reject) => {
  /** Cоздание
   *
   * Выполнение асинхронных действий
   *
   * Внутри этой функции нужно в результате вызвать одну из функций
   * resolve или reject
   */
})

myPromise
  .then((value) => {
    /**Результат выполнения
     *
     * Действия в случае успешного исполнения Промиса
     * Значение value - значение, переданное в вызове
     * функции resolve внутри Промиса
     */
  })
  .catch((error) => {
    /**
     * Действия в случае отклонения Промиса
     * Значение error - значение, переданное в вызове
     * функции reject внутри Промиса
     */
  })

//   ПРАКТИКА

const getData = (url) =>
  new Promise((resolve, reject) =>
    fetch(url)
      .then((response) => response.json())
      .then((json) => resolve(json))
      .catch((error) => reject(error))
  )

getData('https://jsonplaceholder.typicode.com/todos')
  .then((data) => console.log(data))
  .catch((error) => console.log(error.message))
