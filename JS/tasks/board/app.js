const board = document.querySelector('#board');
const colors = ['#ff920a', '#2196f3', '#b6b6b6', '#1f3d1e', '#673ab7'];
const SQUARES_NUMBER = 420;

for (let i = 0; i < SQUARES_NUMBER; i++) {
	const square = document.createElement('div');
	square.classList.add('square');

	square.addEventListener('mouseover', setColor);
	square.addEventListener('mouseleave', removeColor);

	board.append(square);
}
 

function setColor(event) {
	const color = getRandomColor();
	event.target.style.backgroundColor = color;
	event.target.style.boxShadow = `0 0 2px ${color}, 0 0 10px ${color}`;
};

function removeColor(event) {
	event.target.style.backgroundColor = '#1d1d1d';
	event.target.style.boxShadow = '0 0 2px #000';
};

function getRandomColor() {
	return colors[Math.floor(Math.random() * colors.length)];

}
