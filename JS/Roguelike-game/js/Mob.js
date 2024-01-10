import { accessories, field } from "./Game.js"
export class Mob {
    constructor(name, damage = 10, health = 100, x, y) {
        this.name = name
        this.damage = damage
        this.health = health
        this.x = x
        this.y = y
        this.node = this.createMob()
    }

    createMob(id = false) {
        let mob = document.createElement("div")
        mob.className = this.name === "hero" ? "tile tileP" : "tile tileE"
        mob.innerHTML = `<div class="health" style='width: ${this.health}%'></div>`
        mob.setAttribute("data-damage", this.damage)
        id && mob.setAttribute("data-id", id - 1)
        return mob
    }


    getCoordinates() {
        return this && { x: this.x, y: this.y };
    }

    setCoordinates(name, x, y, node) {
        if (name === "hero") {
            accessories.forEach((accessory, index) => {
                if (accessory) {
                    let accX = accessory.parentNode.dataset.x
                    let accY = accessory.parentNode.dataset.y
                    if (x === +accX && y === +accY) {
                        if (accessory.classList.contains("tileHP")) {
                            if (this.health < 100) {
                                if (this.health >= 80) {
                                    this.setHealth(100)
                                } else {
                                    this.setHealth(this.health + 20)
                                }
                                accessory.parentNode.removeChild(accessory)
                                accessories.splice(index, 1)
                            }
                        }
                        if (accessory.classList.contains("tileSW")) {
                            this.setDamage(this.damage + 10)
                            accessory.parentNode.removeChild(accessory)
                            accessories.splice(index, 1)
                        }
                    }
                }

            })
        }
        field.children[x].children[y].insertAdjacentElement("afterbegin", node)
        this.x = x
        this.y = y

    }

    setHealth(health) {
        this.node.children[0].style.width = `${health}%`
        this.health = health
    }

    canMove(name, direction) {
        const isCellBlocked = (field, x, y) => {
            const tileFirstChild = field.children[x].children[y].children[0];
            return (
                field.children[x].children[y].dataset.name === "wall" ||
                tileFirstChild?.classList.contains("tileE") ||
                tileFirstChild?.classList.contains("tileP")
            );
        };

        switch (direction) {
            case "up":
                if (this.y <= 0 || isCellBlocked(field, this.x, this.y - 1)) {
                    return false;
                }
                this.y += -1;
                break;
            case "left":
                if (this.x <= 0 || isCellBlocked(field, this.x - 1, this.y)) {
                    return false;
                }
                this.x += -1;
                break;
            case "bottom":
                if (this.y >= 19 || isCellBlocked(field, this.x, this.y + 1)) {
                    return false;
                }
                this.y += 1;
                break;
            case "right":
                if (this.x >= 35 || isCellBlocked(field, this.x + 1, this.y)) {
                    return false;
                }
                this.x += 1;
                break;
            default:
                return false;
        }
        return true
    }
}