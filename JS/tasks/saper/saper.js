//Game
let mineSum = 10;
let mineCount = 0;
let mapSize = 8;
let cells = new Array(mapSize);
let firstStep = true;
let minesArrayCount = 0;
let isSafe = false;
let flagedMine = 0;
function GetArray() {
	for (let index = 0; index < cells.length; index++) {
		cells[index] = new Array(mapSize);

	}
}
function CreateCells() {
	let parent = document.querySelector(".gameField")
	for (let index = 0; index < cells.length; index++) {
		for (let index2 = 0; index2 < cells.length; index2++) {
			cells[index][index2] = document.createElement("button")
			cells[index][index2].classList.add("cell")
			parent.appendChild(cells[index][index2]);
		}
	}
	locateMines();
	checkMines();
}
function getRandomInt(max) {
	return Math.floor(Math.random() * max);
}

function locateMines() {
	for (let index = 0; index < mineSum; index++) {
		document.querySelectorAll(".cell")[getRandomInt(document.querySelectorAll(".cell").length)].classList.add("mine");
	}
	while (document.querySelectorAll(".mine").length != mineSum) {
		for (let index = 0; index < mineSum - document.querySelectorAll(".mine").length; index++) {
			let number = getRandomInt(document.querySelectorAll(".cell").length);
			if (document.querySelectorAll(".cell")[number].classList.contains("mine") == true) {
				break;
			}
			document.querySelectorAll(".cell")[number].classList.add("mine");
			if (document.querySelectorAll(".mine").length == mineSum) {
				break;
			}
		}
	}
}
function checkMines() {
	for (let index = 0; index < cells.length; index++) {
		for (let index2 = 0; index2 < cells.length; index2++) {
			check(index, index2);
		}

	}
}
function check(value1, value2) {
	if (cells[value1][value2].classList.contains("mine") == true) {
	}
	else {
		mineCount = 0;
		try {
			if (cells[value1 - 1][value2 - 1].classList.contains("mine") == true) {
				mineCount = mineCount + 1
				cells[value1][value2].innerText = mineCount;
			}
		} catch (error) {
		}
		try {
			if (cells[value1 - 1][value2].classList.contains("mine") == true) {
				mineCount = mineCount + 1
				cells[value1][value2].innerText = mineCount;
			}
		} catch (error) {
		}
		try {
			if (cells[value1 - 1][value2 + 1].classList.contains("mine") == true) {
				mineCount = mineCount + 1
				cells[value1][value2].innerText = mineCount;
			}
		} catch (error) {
		}
		try {
			if (cells[value1][value2 - 1].classList.contains("mine") == true) {
				mineCount = mineCount + 1
				cells[value1][value2].innerText = mineCount;
			}
		} catch (error) {
		}
		try {
			if (cells[value1][value2 + 1].classList.contains("mine") == true) {
				mineCount = mineCount + 1
				cells[value1][value2].innerText = mineCount;
			}
		} catch (error) {
		}
		try {
			if (cells[value1 + 1][value2 - 1].classList.contains("mine") == true) {
				mineCount = mineCount + 1
				cells[value1][value2].innerText = mineCount;
			}
		} catch (error) {
		}
		try {
			if (cells[value1 + 1][value2].classList.contains("mine") == true) {
				mineCount = mineCount + 1
				cells[value1][value2].innerText = mineCount;
			}
		} catch (error) {
		}
		try {
			if (cells[value1 + 1][value2 + 1].classList.contains("mine") == true) {
				mineCount = mineCount + 1
				cells[value1][value2].innerText = mineCount;
			}
		} catch (error) {
		}
		if (mineCount > 0) {
			cells[value1][value2].classList.add("HasValue");
		}
	}

}
function GetFlag() {
	ma = document.querySelectorAll(".cell");
	ma.forEach(function (elem) {
		elem.addEventListener("contextmenu", function (e) {
			if (elem.classList.contains("flagImage") == true) {
				elem.classList.remove("flagImage");
				e.preventDefault();
			}
			else if (elem.classList.contains("activeCell")) {
				e.preventDefault();
			}
			else {
				elem.classList.add("flagImage");
				e.preventDefault();
			}

		});
	}
	)
}
function preventDefault() {
	return false;
}
function SetActiveCell() {
	for (let index = 0; index < cells.length; index++) {
		for (let index2 = 0; index2 < cells.length; index2++) {
			cells[index][index2].addEventListener("click", function () {
				if (saveFirstStep.checked == true && firstStep == true) {
					if (cells[index][index2].classList.contains("mine") != true && cells[index][index2].classList.contains("HasValue") != true) {
						openCells(index, index2);
						firstStep = false;
						e.preventDefault()
					}
					else {
						while (isSafe == false) {
							for (let index = 0; index < document.querySelectorAll(".cell").length; index++) {
								if (document.querySelectorAll(".cell")[index].classList.contains("mine") == true) {
									document.querySelectorAll(".cell")[index].classList.remove("mine");
								}
							}
							for (let index = 0; index < document.querySelectorAll(".cell").length; index++) {
								if (document.querySelectorAll(".cell")[index].classList.contains("HasValue") == true) {
									document.querySelectorAll(".cell")[index].classList.remove("HasValue")
									document.querySelectorAll(".cell")[index].innerText = "";
								}
							}
							locateMines();
							checkMines();
							if (cells[index][index2].classList.contains("mine") != true && cells[index][index2].classList.contains("HasValue") != true) {
								isSafe = false;
								break;
							}
						}
						firstStep = false;
						isSafe = false;
						openCells(index, index2);
						e.preventDefault();
					}
				}
				else {
					openCells(index, index2);
					e.preventDefault();
				}
			})
		}
	}
}
function openCells(value1, value2) {
	if (cells[value1][value2].classList.contains("mine") == true) {
		cells[value1][value2].classList.add("mineImage")
		for (let index = 0; index < cells.length; index++) {
			for (let index2 = 0; index2 < cells.length; index2++) {
				if (cells[index][index2].classList.contains("mine") == true) {
					cells[index][index2].classList.add("mineImage")
				}
				cells[index][index2].disabled = true;
			}
		}
		alert("You lose");
	}
	if (cells[value1][value2].classList.contains("HasValue") == true) {
		cells[value1][value2].classList.add("activeCell");
	}
	if ((cells[value1][value2].classList.contains("HasValue") != true && cells[value1][value2].classList.contains("mine") != true)) {
		cells[value1][value2].classList.add("activeCell");
		try {
			if ((cells[value1 - 1][value2 - 1].classList.contains("HasValue") != true && cells[value1 - 1][value2 - 1].classList.contains("mine") != true) && cells[value1 - 1][value2 - 1].classList.contains("activeCell") != true) {
				var i1 = value1 - 1;
				var i2 = value2 - 1;
				openCells(i1, i2)
			}
			else if (cells[value1 - 1][value2 - 1].classList.contains("HasValue") == true && cells[value1 - 1][value2 - 1].classList.contains("activeCell") != true) {
				cells[value1 - 1][value2 - 1].classList.add("activeCell")
			}
		} catch (error) { }
		try {
			if ((cells[value1 - 1][value2].classList.contains("HasValue") != true && cells[value1 - 1][value2].classList.contains("mine") != true) && cells[value1 - 1][value2].classList.contains("activeCell") != true) {
				var i1 = value1 - 1;
				var i2 = value2;
				openCells(i1, i2)
			}
			else if (cells[value1 - 1][value2].classList.contains("HasValue") == true && cells[value1 - 1][value2].classList.contains("activeCell") != true) {
				cells[value1 - 1][value2].classList.add("activeCell")
			}
		} catch (error) { }
		try {
			if ((cells[value1 - 1][value2 + 1].classList.contains("HasValue") != true && cells[value1 - 1][value2 + 1].classList.contains("mine") != true) && cells[value1 - 1][value2 + 1].classList.contains("activeCell") != true) {
				var i1 = value1 - 1;
				var i2 = value2 + 1;
				openCells(i1, i2)
			}
			else if (cells[value1 - 1][value2 + 1].classList.contains("HasValue") == true && cells[value1 - 1][value2 + 1].classList.contains("activeCell") != true) {
				cells[value1 - 1][value2 + 1].classList.add("activeCell")
			}
		} catch (error) { }
		try {
			if ((cells[value1][value2 - 1].classList.contains("HasValue") != true && cells[value1][value2 - 1].classList.contains("mine") != true) && cells[value1][value2 - 1].classList.contains("activeCell") != true) {
				var i1 = value1;
				var i2 = value2 - 1;
				openCells(i1, i2)
			}
			else if ((cells[value1][value2 - 1].classList.contains("HasValue") == true) && cells[value1][value2 - 1].classList.contains("activeCell") != true) {
				cells[value1][value2 - 1].classList.add("activeCell")
			}
		} catch (error) { }
		try {
			if ((cells[value1][value2 + 1].classList.contains("HasValue") != true && cells[value1][value2 + 1].classList.contains("mine") != true) && cells[value1][value2 + 1].classList.contains("activeCell") != true) {
				var i1 = value1;
				var i2 = value2 + 1;
				openCells(i1, i2)
			}
			else if ((cells[value1][value2 + 1].classList.contains("HasValue") == true) && cells[value1][value2 + 1].classList.contains("activeCell") != true) {
				cells[value1][value2 + 1].classList.add("activeCell")
			}
		} catch (error) { }
		try {
			if ((cells[value1 + 1][value2 - 1].classList.contains("HasValue") != true && cells[value1 + 1][value2 - 1].classList.contains("mine") != true) && cells[value1 + 1][value2 - 1].classList.contains("activeCell") != true) {
				var i1 = value1 + 1;
				var i2 = value2 - 1;
				openCells(i1, i2)
			}
			else if ((cells[value1 + 1][value2 - 1].classList.contains("HasValue") == true) && cells[value1 + 1][value2 - 1].classList.contains("activeCell") != true) {
				cells[value1 + 1][value2 - 1].classList.add("activeCell")
			}
		} catch (error) { }
		try {
			if ((cells[value1 + 1][value2].classList.contains("HasValue") != true && cells[value1 + 1][value2].classList.contains("mine") != true) && cells[value1 + 1][value2].classList.contains("activeCell") != true) {
				var i1 = value1 + 1;
				var i2 = value2;
				openCells(i1, i2)
			}
			else if ((cells[value1 + 1][value2].classList.contains("HasValue") == true) && cells[value1 + 1][value2].classList.contains("activeCell") != true) {
				cells[value1 + 1][value2].classList.add("activeCell")
			}
		} catch (error) { }
		try {
			if ((cells[value1 + 1][value2 + 1].classList.contains("HasValue") != true && cells[value1 + 1][value2 + 1].classList.contains("mine") != true) && cells[value1 + 1][value2 + 1].classList.contains("activeCell") != true) {
				var i1 = value1 + 1;
				var i2 = value2 + 1;
				openCells(i1, i2)
			}
			else if ((cells[value1 + 1][value2 + 1].classList.contains("HasValue") == true) && cells[value1 + 1][value2 + 1].classList.contains("activeCell") != true) {
				cells[value1 + 1][value2 + 1].classList.add("activeCell")
			}
		} catch (error) { }

	}

}

function checkWin() {

}
function startGame() {
	document.querySelector(".gn")
	GetArray();
	CreateCells();
	GetFlag();
	SetActiveCell();
}
startGame();
//page
let isMenuOn = false;
mediumLevel.checked = false;
hardLevel.checked = false;
function menuIcon(x) {
	x.classList.toggle("change");
	if (isMenuOn == false) {
		document.querySelector(".settings").style.marginRight = "-1200px"
		isMenuOn = true
	}
	else {
		document.querySelector(".settings").style.marginRight = "-24244px"
		isMenuOn = false
	}
}
