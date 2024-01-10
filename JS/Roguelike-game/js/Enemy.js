import { Mob } from "./Mob.js";
import { randomIntFromInterval, availableTiles, isEmptyTile, enemies } from "./Game.js"
export class Enemy extends Mob {

    super(name, damage, health) {
        this.name = name
        this.damage = damage
        this.health = health
            .node = this.createMob(this.id)
                ({ x: this.x, y: this.y }) = this.getCoordinates()
    }

    setEnemy(id) {
        let x = randomIntFromInterval(0, 35)
        let y = randomIntFromInterval(0, 19)
        while (!isEmptyTile(x, y)) {
            x = randomIntFromInterval(0, 35)
            y = randomIntFromInterval(0, 19)
        }
        this.node = this.createMob(id)
        this.setCoordinates(this.name, x, y, this.node)
    }

    enemyAttack(hero) {
        if (hero.health <= 0) {
            location.reload()
        } else {
            setTimeout(() => {
                hero.setHealth(hero.health - this.damage)
            }, 300)
        }
    }

}

