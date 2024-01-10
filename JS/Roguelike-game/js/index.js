import { Enemy } from "./Enemy.js"
import { enemies, Game } from "./Game.js"
import { Hero } from "./Hero.js"
let game = new Game()
game.init()
let hero = new Hero("hero")
hero.setStartHero()
for (let i = 1; i < 11; i++) {
    let enemy = new Enemy("enemy")
    enemy.setEnemy(i)
    enemies.push(enemy)
}

game.moveEnemy(enemies, hero)

document.addEventListener("keydown", (event) => {
    let direction
    switch (event.code) {
        case "KeyW":
            direction = "up";
            break;
        case "KeyA":
            hero.node.style.transform = "rotateY(180deg)"
            hero.node.children[0].style.transform = "rotateY(0deg)"
            direction = "left";
            break;
        case "KeyS":
            direction = "bottom";
            break;
        case "KeyD":
            hero.node.style.transform = "rotateY(0)";
            hero.node.children[0].style.transform = "rotateY(180deg)"
            direction = "right";
            break;
        case "Space":
            hero.isEnemy(enemies)
        default:
            direction = ""
            break;
    }
    // debugger
    if (hero.canMove("hero", direction)) {
        hero.setCoordinates(hero.name, hero.x, hero.y, hero.node)
    }
});