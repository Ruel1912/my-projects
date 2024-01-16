class Animal {
    static type = 'ANIMAL';

    constructor(options) {
        this.name = options.name,
        this.age = options.age,
        this.hasTail = options.hasTail
    }

    voice() {
        console.log('I am animal');
    }
}

const animal = new Animal({
    name: 'Animal',
    age: 5,
    hasTail: true
})

console.log(Animal.type);

class Cat extends Animal {
    static type = 'CAT'

// super() - конструктор родителя
    constructor(options) {
        super(options)
        this.color = options.color
    }

    voice() {
// Сначала вызывается метод voice класса Animal
// Затем класса Cat
        super.voice()
        console.log('I am cat');
    }

    get ageInfo() {
        return this.age * 7;
    }

    set ageInfo(newAge) {
        this.age = newAge;
    }
}

const cat = new Cat({
    name: 'Cat',
    age: 7,
    hasTail: true,
    color: 'black'
})

console.log(Cat.type);

cat.ageInfo = 8;
console.log(cat.ageInfo);







class Component {
    constructor(selector) {
        this.$el = document.querySelector(selector);
    }

    hide() {
        this.$el.style.display = 'none';
    }

    show() {
        this.$el.style.display = 'block';
    }
}

class Box extends Component {
    constructor(options) {
        super(options.selector)

        this.$el.style.width = this.$el.style.width = `${option.size}px`;
        this.$el.style.background = options.color;
    }
}

class Circle extends Box {
    constructor(options) {
        super(options)

        this.$el.style.borderRadius = '50%';
    }
}

const box1 = new Box({
    selector: '#box1',
    size: 100,
    color: '#F00'
})

const cirlce = new Circle({
    selector: '#cirlce',
    size: 90,
    color: '#0F0'
})
