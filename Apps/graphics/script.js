let canvas = document.querySelector("canvas");
let context = canvas.getContext("2d");
let w = canvas.width;
let h = canvas.height;

let mouse = {x: 0, y: 0};
let lineWidth;
let color;
let draw = false;

document.getElementById("clear").addEventListener("click", clear);

function clear() {
    context.clearRect(0, 0, w, h);
}

function changeColor(obj) {
    switch (obj.id) {
        case "white":
            context.strokeStyle = "#eee";
            break;
        case "black":
            context.strokeStyle = "black";
            break;
        case "red":
            context.strokeStyle = "red";
            break;
        case "green":
            context.strokeStyle = "green";
            break;
        case "blue":
            context.strokeStyle = "blue";
            break;
        case "cyan":
            context.strokeStyle = "cyan";
            break;
        case "magenta":
            context.strokeStyle = "magenta";
            break;
        case "yellow":
            context.strokeStyle = "yellow";
            break;
    }
}

canvas.addEventListener("mousedown", function (e) {
    lineWidth = Number(document.getElementById("width").value);
    color = document.getElementById("color").value;
    mouse.x = e.pageX - this.offsetLeft;
    mouse.y = e.pageY - this.offsetTop;
    draw = true;
    context.beginPath();
    context.moveTo(mouse.x, mouse.y);
});
canvas.addEventListener("mousemove", function (e) {

    if (draw) {
        mouse.x = e.pageX - this.offsetLeft;
        mouse.y = e.pageY - this.offsetTop;
        context.lineTo(mouse.x, mouse.y);
        if (lineWidth !== 0) context.lineWidth = lineWidth;
        if (color !== "") context.strokeStyle = color;
        if (context.strokeStyle === "#eee") {
            context.beginPath();
            context.fillStyle = color;
            context.fillRect(mouse.x, mouse.y, context.lineWidth, context.lineWidth);
            context.closePath();
        } else {
            context.stroke();
        }
    }
});
canvas.addEventListener("mouseup", function (e) {

    mouse.x = e.pageX - this.offsetLeft;
    mouse.y = e.pageY - this.offsetTop;
    context.lineTo(mouse.x, mouse.y);
    context.stroke();
    context.closePath();
    draw = false;

});




