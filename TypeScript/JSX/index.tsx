// Для начала в tsconfig.json установить jsx в значение 'react'
// Ввести npm i react
// Ввести npm i -D @types/react

import React from 'react';

// Создание элемента через JSX
const a: JSX.Element = <div tabIndex={0}>{1+ 1}</div>;

// Создание элемента через функцию React
const b: JSX.Element = React.createElement('div', {tabIndex: 0}, 1 + 1);