document.addEventListener("DOMContentLoaded", () => {
    const timerButtons = document.querySelectorAll(".open-modal[data-modal='main']");
    timerButtons.forEach(timerButton => {
        timerButton.addEventListener("click", () => {
            if (!localStorage.getItem('timer')) {
                currentTime = new Date();
                endTime = new Date(currentTime.getTime() + (5 * 60 * 1000));
                localStorage.setItem('timer', endTime.getTime());
            }

            setInterval(updateTimer, 1000);
            updateTimer();

            function updateTimer() {
                const currentTime = new Date();
                const endTime = new Date(parseInt(localStorage.getItem('timer')));

                const remainingTime = endTime - currentTime;

                if (remainingTime <= 0) {
                    currentTime = new Date();
                    endTime = new Date(currentTime.getTime() + (5 * 60 * 1000));
                    localStorage.setItem('timer', endTime.getTime());
                } else {
                    const minutes = Math.floor((remainingTime % (60 * 60 * 1000)) / (60 * 1000));
                    const seconds = Math.floor((remainingTime % (60 * 1000)) / 1000);

                    document.getElementById('minutes').textContent = formatTime(minutes);
                    document.getElementById('seconds').textContent = formatTime(seconds);
                }
            }

            function formatTime(time) {
                return time < 10 ? '0' + time : time;
            }

        })
    })
})