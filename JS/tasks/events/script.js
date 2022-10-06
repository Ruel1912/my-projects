document.querySelector(".event").addEventListener("click", changeContent);
document.querySelector(".click").addEventListener("click", eppilepsition);

function changeContent() {
    let second = document.querySelectorAll(".field")[1].outerHTML;
    document.querySelectorAll(".field")[1].outerHTML = document.querySelectorAll(".field")[0].outerHTML;
    document.querySelectorAll(".field")[0].outerHTML = second;
}

function eppilepsition() {
    let value = document.getElementsByName("num")[0].value;
    if (!value){
        alert("Введите количество квадратиков, желательно кратное 7!");
    } else {
        let eppileption = document.querySelector(".eppilepstion")
        eppileption.innerHTML = "";
        eppileption.style.opacity = "1";
        for (let i = 0; i < value; i++){
            let div = document.createElement("div");
            eppileption.append(div);
        }
    }
    let timer = setInterval("func()", 500);
    setTimeout(() => {
        clearInterval(timer);
        for (let div of document.querySelectorAll(".eppilepstion div")){
            div.style.backgroundColor = "#FFFFFF";}
        }, 10000);


}

function func() {
    let list_div = document.querySelectorAll(".eppilepstion div");
    for (let div of list_div) {
        let red = Math.floor(Math.random() * 255);
        let green = Math.floor(Math.random() * 255);
        let blue = Math.floor(Math.random() * 255);
        div.style.backgroundColor = `rgb(${red}, ${green}, ${blue})`;
    }
}
