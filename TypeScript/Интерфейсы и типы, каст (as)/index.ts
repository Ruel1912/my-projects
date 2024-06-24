// Отличие типов от интерфейсов:
// 1. Интерфейсы могут наследоваться
// 2. Типам недоступно добавление новых свойств
// 3. Если интерфейс переопределить, то в результате можно будет использовать параметры a и b
// Тип в таком случае выкинет ошибку
//Вывод: Лучше юзать именно интерфейсы, в отдельных файлах


type Point = {
  x: number,
  y: number
};

type Point3D = Point & { // Один из вариантов наследования
  z: number;
}

type stringOrNumber = string | number;



interface PointInterface {
  x: number,
  y: number
};

interface Point3DInteface extends PointInterface { // Наследование от PointerInterface
  z: number,
} 


interface Test {
  a: number;
}

interface Test {
  b: number
}


function print(coord: Point) {}
function print2(coord: stringOrNumber) {}
function print3(coord: PointInterface) {}



// Ошибка, отсутствует z, но можно испраивть если добавить as
const c = (point: PointInterface) => {
  const d: Point3DInteface = point as Point3DInteface;
}

// Если не прописать as, то переменная canvas может быть HTMLElelement | null
// С использованием as, переменная всегда будет HTMLCanvasElement
const canvas = document.getElementById('canvas') as HTMLCanvasElement 