// Литеральный тип - в качесте тип данных не string, а конкретная строка или несколько строк

// Что-то вроде ENUM из SQL
const c: 'test' = 'test'

type actionType = 'up' | 'down';

interface ComplexActionInterface {
  s: string
}

// Литеральные типы могут быть скомбинированы с интерфейсами
function performAction(action: actionType | ComplexActionInterface) {
  switch (action) {
    case 'down':
      return -1;
    case 'up':
      return 1;
  }
}

// ENUM

// Числовой ENUM
enum DirectionNumber {
  Up = 1, //Отсчет 0, но можно задать любое число
  Down,
  Left,
  Right
} 

// Строковый ENUM
enum Direction {
  Up = "UP", //Отсчет 0, но можно задать любое число
  Down = "DOWN",
  Left = "LEFT",
  Right = "RIGHT"
} 

// Гетерогенный ENUM (смешанный)
enum Decision {
  Yes = 1,
  No = "NO"
} 

// Расчетный ENUM (В качестве значения функция)
// Работает только с числами
function calcEnum() {
  return 2;
}

enum calcEnumExample {
  Yes = calcEnum(),
  No = 0
}


// Enum в параметре функции передается как объект
function runEnum(obj: {Up: string}) {

} 

runEnum(Direction);

// Может быть константой
const enum ConstEnum {
  A,
  B
}

let d = ConstEnum.A // 0


// ENUM и NEVER

enum Dice {
  One = 1,
  Two,
  Three
}

function ruDice(dice: Dice) {
  switch (dice) {
    case Dice.One:
      return 'Один'
    case Dice.Two:
      return 'Два'
    case Dice.Three:
      return 'Три'
    default:
      const a: never = dice
  }
}