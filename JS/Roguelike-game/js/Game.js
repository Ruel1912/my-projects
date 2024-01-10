const randomLines = []
const randomRooms = []
const field = document.querySelector(".field")
const availableTiles = document.querySelectorAll(".available")
let enemies = []
let accessories = []


export class Game {
    init() {
        for (let i = 0; i < 36; i++) {
            const fieldRow = document.createElement("div");
            fieldRow.classList.add("field__row");
            for (let j = 0; j < 20; j++) {
                const block = document.createElement("div");
                block.classList.add("tile", "tileW");
                block.setAttribute("data-x", i)
                block.setAttribute("data-y", j)
                block.setAttribute("data-name", "wall")
                fieldRow.append(block);
            }
            field.append(fieldRow);
        }
        this.addRoads(randomIntFromInterval(3, 5), "x")
        this.addRoads(randomIntFromInterval(3, 5), "y")
        this.addRooms(randomIntFromInterval(5, 10))
        this.setHP()
        this.setSword()
    }

    // Проверка на соседние дорожки
    isNearByRoad(randomLines, line) {
        return randomLines.some(randomLine => Math.abs(randomLine.coordinate - line.coordinate) <= 1) ? true : false
    }

    checkRectangles(randomLines, room) {
        for (let i = 0; i < randomLines.length; i++) {
            if (randomLines[i].direction === "y") {
                randomLines[i].x = 0
                randomLines[i].y = randomLines[i].coordinate
                randomLines[i].width = 1
                randomLines[i].height = 19
            } else {
                randomLines[i].x = randomLines[i].coordinate
                randomLines[i].y = 0
                randomLines[i].width = 35
                randomLines[i].height = 1
            }
            if (this.checkIntersection(randomLines[i], room)) {
                return true
            }
        }
        return false
    }

    // Проверка комнат на соприкосновение с дорожками
    checkIntersection(rect1, rect2) {
        if (rect1.x < rect2.x + rect2.width &&
            rect1.x + rect1.width > rect2.x &&
            rect1.y < rect1.y + rect2.height &&
            rect1.y + rect1.height > rect2.y) {
            return true
        }
        return false
    }


    // Добавление дорожек
    addRoads(countRoad, direction) {
        for (let c = 0; c < countRoad; c++) {
            let line = {
                direction,
                coordinate: direction === "y" ? randomIntFromInterval(0, 35) : randomIntFromInterval(0, 19)
            }
            if (c !== 0) {
                while (this.isNearByRoad(randomLines, line)) {
                    line.coordinate = direction === "y" ? randomIntFromInterval(0, 35) : randomIntFromInterval(0, 19)

                }
            }
            for (let i = 0; i < 36; i++) {
                for (let j = 0; j < 20; j++) {
                    if ((direction === "y" && i === line.coordinate) || (direction === "x" && j === line.coordinate)) {
                        field.children[direction === "y" ? line.coordinate : i].children[direction === "y" ? j : line.coordinate].className = "tile road available";
                        field.children[direction === "y" ? line.coordinate : i].children[direction === "y" ? j : line.coordinate].dataset.name = "floor";
                        field.children[direction === "y" ? line.coordinate : i].children[direction === "y" ? j : line.coordinate].dataset.direction = direction === "y" ? "y" : "x";
                    }
                }
            }
            randomLines.push(line)
        }
    }

    // Добавление комнат
    addRooms(countRoom) {
        for (let c = 0; c < countRoom; c++) {
            let width = randomIntFromInterval(3, 8)
            let height = randomIntFromInterval(3, 8)
            let x = randomIntFromInterval(0, 35 - width)
            let y = randomIntFromInterval(0, 20 - height)
            const room = {
                x, y, width, height
            }
            if (c !== 0) {
                while (!this.checkRectangles(randomLines, room)) {
                    room.width = randomIntFromInterval(3, 8)
                    room.height = randomIntFromInterval(3, 8)
                    room.x = randomIntFromInterval(0, 35 - width)
                    room.y = randomIntFromInterval(0, 20 - height)
                }
            }
            for (let i = x; i < x + width; i++) {
                for (let j = y; j < y + height; j++) {
                    field.children[i].children[j].className = "tile room available"
                    field.children[i].children[j].dataset.name = "floor"
                }
            }
            randomRooms.push(room)
        }
    }

    setHP() {
        for (let i = 0; i < 10; i++) {
            let x = randomIntFromInterval(0, 35)
            let y = randomIntFromInterval(0, 19)
            while (!isEmptyTile(x, y)) {
                x = randomIntFromInterval(0, 35)
                y = randomIntFromInterval(0, 19)
            }
            let node = document.createElement("div")
            node.className = "tile tileHP"
            accessories.push(node)
            field.children[x].children[y].insertAdjacentElement("afterbegin", node)
        }
    }

    setSword() {
        for (let i = 0; i < 2; i++) {
            let x = randomIntFromInterval(0, 35)
            let y = randomIntFromInterval(0, 19)
            while (!isEmptyTile(x, y)) {
                x = randomIntFromInterval(0, 35)
                y = randomIntFromInterval(0, 19)
            }
            let node = document.createElement("div")
            node.className = "tile tileSW"
            accessories.push(node)
            field.children[x].children[y].insertAdjacentElement("afterbegin", node)
        }
    }

    moveEnemy(enemies, hero) {
        // Определяем функцию для перемещения каждого врага к герою
        function moveEnemies() {
            enemies.forEach(function (enemy) {
                // debugger
                // Определяем направление движения
                let direction
                let dx = hero.x - enemy.x;
                let dy = hero.y - enemy.y;
                let stopEnemy = false

                if (!stopEnemy && ((Math.abs(dx) === 1 && dy === 0) || (Math.abs(dy) === 1 && dx === 0))) {
                    stopEnemy = false
                    enemy.enemyAttack(hero)

                }
                // Проверяем, находится ли враг на одной оси с героем
                if ((dx === 0 || dy === 0) && !stopEnemy) {

                    // Если находится, то двигаем в направлении героя
                    if (dx === 0) {
                        if (dy > 0) {
                            direction = "bottom"
                        }
                        if (dy < 0) {
                            direction = "up"
                        }
                        if (enemy.canMove("enemy", direction)) {
                            enemy.setCoordinates(enemy.name, enemy.x, enemy.y, enemy.node)
                        }
                    } else {
                        if (dx > 0) {
                            direction = "right"
                            enemy.node.style.transform = "rotateY(0)";
                        }
                        if (dx < 0) {
                            direction = "left"
                            enemy.node.style.transform = "rotateY(180deg)";
                        }
                        if (enemy.canMove("enemy", direction)) {

                            enemy.setCoordinates(enemy.name, enemy.x, enemy.y, enemy.node)
                        }
                    }
                }
            });

            setTimeout(moveEnemies, 500);
        }



        // Запускаем функцию перемещения врагов
        moveEnemies();


    }
}

function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min)
}

function isEmptyTile(x, y) {
    return (field.children[x].children[y].hasChildNodes() || field.children[x].children[y].classList.contains("tileW")) ? false : true
}

export { field, enemies, availableTiles, accessories, randomIntFromInterval, isEmptyTile }