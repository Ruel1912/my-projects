import { enemies } from "./Game.js";
import { Mob } from "./Mob.js";


export class Hero extends Mob {
    super(name, damage, health) {
        this.name = name
        this.damage = damage
        this.health = health
        this.node = this.createMob()
            ({ x: this.x, y: this.y }) = this.getCoordinates()
    }

    setStartHero() {
        let heroX = parseInt(document.querySelectorAll(".available")[0].dataset.x);
        let heroy = parseInt(document.querySelectorAll(".available")[0].dataset.y);
        this.setCoordinates(this.name, heroX, heroy, this.node)
    }

    isEnemy(enemies) {
        enemies.forEach(enemy => {
            if (
                ((this.x + 1 === enemy.x) && (this.y === enemy.y)) ||
                ((this.x - 1 === enemy.x) && (this.y === enemy.y)) ||
                ((this.x === enemy.x) && (this.y + 1 === enemy.y)) ||
                ((this.x === enemy.x) && (this.y - 1 === enemy.y))
            ) {
                this.attackEnemy(enemy)

            }
            return false

        });
    }

    attackEnemy(enemy) {
        if (enemy.health <= 0) {
            let enemyObj = enemies.find(enemyArr => +enemyArr.node.dataset.id === +enemy.node.dataset.id)
            let index = enemies.indexOf(enemyObj)
            enemies[index].x = -1
            enemies[index].y = -1
            enemies[index].node.parentNode.removeChild(enemy.node)
            enemies.splice(index, 1)
            if (enemies.length === 0) {
                alert("Вы победили")
                setTimeout(() => location.reload(), 1000)
            }

        } else {
            enemy.setHealth(enemy.health - this.damage)
        }
    }



    setDamage(damage) {
        this.damage += damage
    }


}