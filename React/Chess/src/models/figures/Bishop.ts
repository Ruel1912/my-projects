import { Cell } from "../Cell";
import { Colors } from "../Colors";
import { Figure } from "./Figure";
import blackLogo from "../../assets/black-bishop.png"
import whiteLogo from "../../assets/white-bishop.png"
export class Bishop extends Figure {
  constructor(color: Colors, cell: Cell) {
    super(color, cell)

  }
}