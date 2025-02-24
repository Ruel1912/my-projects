const person = {
  name: 'Bob',
  age: 25,
}
// Varinat 1

const person2 = Object.assign({}, person)
person2.age = 26

console.log(person2.age) // 26
console.log(person.age) // 25

// Varinat 2

const person2 = { ...person }
person2.name = 'Alice'

console.log(person2.name) // Alice
console.log(person.name) // Bob

// Varinat 3

const person2 = JSON.parse(JSON.stringify(person))
person2.name = 'Alice'

console.log(person2.name) // Alice
console.log(person.name) // Bob
