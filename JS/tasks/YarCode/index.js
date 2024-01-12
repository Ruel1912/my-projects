// Генерация случайного числа 0 или 1
const generateRandomBinary = () => Math.round(Math.random())

// Генерация таблицы со случайными числами
const generateRandomTable = () => {
  let table = document.getElementById('myTable')

  for (let i = 0; i < SIZE; i++) {
    // Создание строки
    let row = table.insertRow(i)
    for (let j = 0; j < SIZE; j++) {
      // Создание ячейки
      let cell = row.insertCell(j)
      cell.textContent = generateRandomBinary()
      cell.setAttribute("data-x", i)
      cell.setAttribute("data-y", j)
    }
  }
}

// Покрасить все ячейки в желтый 
const paintCells = () => document.querySelectorAll('td').forEach(cell => cell.style.backgroundColor = 'yellow')

// Обновить страницу
const pageReload = () => window.location.reload()

// Возвращает количество единиц рядом с клеткой
const countAdjacentZeros = (row, col) => {
  let count = 0

  // Массив с относительными координатами соседей (сверху, снизу, слева, справа)
  const neighbors = [
    { row: row - 1, col }, { row: row + 1, col },
    { row, col: col - 1 }, { row, col: col + 1 },
  ]

  neighbors.forEach(neighbor => {
    const { row: newRow, col: newCol } = neighbor

    // Если ячейки не выходит за границы и содержит единицу
    if (
      newRow >= 0 && newRow < SIZE &&
      newCol >= 0 && newCol < SIZE &&
      document.getElementById('myTable').rows[newRow].cells[newCol].textContent === '1'
    ) count++
  })

  return count
}


// Вывод количества ячеек с нулями, имеющими более двух соседей
const checkAdjacentZeros = () => {
  let zerosCount = 0

  Array.from(document.querySelectorAll('td'))
    .filter(cell => cell.textContent === "0")
    .forEach(cell => {
      let row = parseInt(cell.dataset.x);
      let col = parseInt(cell.dataset.y);
      let adjacentZeros = countAdjacentZeros(row, col)
      if (adjacentZeros > 2) {
        cell.style.backgroundColor = "red"
        zerosCount++
      }
    })

  alert(`Нулевые ячейки, имеющие рядом более двух единиц: ${zerosCount}\nПримечание: пометил красным, чтобы было легче увидеть`)
}

const SIZE = 5; // Размер таблицы
// Кнопки таблицы
const cellButtons = document.querySelectorAll(".buttons button")
const buttonPaint = document.querySelector(".button-paint")
const buttonPrint = document.querySelector(".button-print")
const buttonReload = document.querySelector(".button-reload")
// Добавления слушателя по клику для кнопок
cellButtons.forEach(cellButton => cellButton.addEventListener('click', paintCells))
buttonPrint.addEventListener("click", checkAdjacentZeros)
buttonReload.addEventListener("click", pageReload)
// Генерация таблицы
generateRandomTable()