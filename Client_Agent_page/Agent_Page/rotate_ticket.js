document.addEventListener('DOMContentLoaded', function() {
    const tickets = document.querySelectorAll(".innerCard");

    tickets.forEach((ticket) => {
        let touchstartX = 0;
        let touchendX = 0;
        let n_dg = 0;

        function reset() {
            if (n_dg === 360 || n_dg === -360) {
                ticket.classList.remove("transition");
                ticket.style.transform = `rotateY(0deg)`;
                n_dg = 0;
            }
        }

        ticket.addEventListener("touchstart", function (event) {
            reset();
            touchstartX = event.changedTouches[0].screenX;
        });

        ticket.addEventListener("touchend", function (event) {
            touchendX = event.changedTouches[0].screenX;
            handleSwipeGesture();
        });

        function handleSwipeGesture() {
            if (touchendX < touchstartX) {
                console.log("swiped left");
                n_dg += -180;
                ticket.classList.add("transition");
                ticket.style.transform = `rotateY(${n_dg}deg)`;
            } else if (touchendX > touchstartX) {
                console.log("swiped right");
                n_dg += 180;
                ticket.classList.add("transition");
                ticket.style.transform = `rotateY(${n_dg}deg)`;
            }
        }
    });
});