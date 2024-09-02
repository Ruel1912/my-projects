"use strict";
// Литеральный тип - в качесте тип данных не string, а конкретная строка или несколько строк
// Что-то вроде ENUM из SQL
const c = 'test';
// Литеральные типы могут быть скомбинированы с интерфейсами
function performAction(action) {
    switch (action) {
        case 'down':
            return -1;
        case 'up':
            return 1;
    }
}
// ENUM
// Числовой ENUM
var DirectionNumber;
(function (DirectionNumber) {
    DirectionNumber[DirectionNumber["Up"] = 1] = "Up";
    DirectionNumber[DirectionNumber["Down"] = 2] = "Down";
    DirectionNumber[DirectionNumber["Left"] = 3] = "Left";
    DirectionNumber[DirectionNumber["Right"] = 4] = "Right";
})(DirectionNumber || (DirectionNumber = {}));
// Строковый ENUM
var Direction;
(function (Direction) {
    Direction["Up"] = "UP";
    Direction["Down"] = "DOWN";
    Direction["Left"] = "LEFT";
    Direction["Right"] = "RIGHT";
})(Direction || (Direction = {}));
// Гетерогенный ENUM (смешанный)
var Decision;
(function (Decision) {
    Decision[Decision["Yes"] = 1] = "Yes";
    Decision["No"] = "NO";
})(Decision || (Decision = {}));
// Расчетный ENUM (В качестве значения функция)
// Работает только с числами
function calcEnum() {
    return 2;
}
var calcEnumExample;
(function (calcEnumExample) {
    calcEnumExample[calcEnumExample["Yes"] = calcEnum()] = "Yes";
    calcEnumExample[calcEnumExample["No"] = 0] = "No";
})(calcEnumExample || (calcEnumExample = {}));
// Enum в параметре функции передается как объект
function runEnum(obj) {
}
runEnum(Direction);
let d = 0 /* ConstEnum.A */; // 0
// ENUM и NEVER
var Dice;
(function (Dice) {
    Dice[Dice["One"] = 1] = "One";
    Dice[Dice["Two"] = 2] = "Two";
    Dice[Dice["Three"] = 3] = "Three";
})(Dice || (Dice = {}));
function reDice(dice) {
    switch (dice) {
        case Dice.One:
            return 'Один';
        case Dice.Two:
            return 'Два';
        case Dice.Three:
            return 'Три';
        default:
            const a = dice;
    }
}
