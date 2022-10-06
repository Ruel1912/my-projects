let hour = document.getElementById("hour");
let minute = document.getElementById("minute");
let second = document.getElementById("second");
let start = document.querySelector(".start");
let stop = document.querySelector(".stop");
let inputs = document.querySelectorAll(".input");

start.onclick = function () {
    console.log(inputs);
    for (let input of inputs) {
        input.disabled = true;
        input.style.backgroundColor = "antiquewhite";
    }
    start.classList.add("visually-hidden");
    stop.classList.remove("visually-hidden");
    isPaused = false;
    startTimer();
    clearInterval(timerGo);
}

stop.onclick = function () {
    hour.value = 0;
    minute.value = 0;
    second.value = 0;
    clearInterval(timerGo);
    for (let input of inputs) {
        input.disabled = false;
        input.style.backgroundColor = "white";
    }
    stop.classList.add("visually-hidden");
    start.classList.remove("visually-hidden");

}

function startTimer() {
    let date = new Date();
    date.setHours( (date.getHours() + parseInt(hour.value)),
        (date.getMinutes() + parseInt(minute.value)),
        (date.getSeconds() + parseInt(second.value))
    );
    var timerGo = setInterval(() => {
        {
            let interval = date.getTime() - Date.now();
            if (interval < 0 ) {
                clearInterval(timerGo);
                alert("Время вышло");
                for (let input of inputs) {
                    input.disabled = false;
                    input.style.backgroundColor = "white";
                }
                stop.classList.add("visually-hidden");
                start.classList.remove("visually-hidden")
                return;
            }
            hour.value = Math.floor((interval / (1000 * 60 * 60)) % 24);
            minute.value = Math.floor((interval / (1000 * 60)) % 60 );
            second.value = Math.floor((interval / 1000) % 60);
        }
    }, 0);
}
