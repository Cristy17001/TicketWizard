document.addEventListener('DOMContentLoaded', function() {
    const tickets = document.querySelectorAll(".innerCard");
    const add_btn = document.querySelector(".add-btn");
    const scroll_fix = document.querySelector("#scroll-fix");
    const close = document.querySelector(".close");
    const filter = document.querySelector(".filter-background");
    const opened = document.querySelector(".opened-ticket");
    const create = document.querySelector(".create-card");



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

        ticket.addEventListener("click", function (event) {
            scroll_fix.classList.add("fixed");
            filter.classList.remove("hide");
            create.classList.add("hide");
            opened.classList.remove("hide");
        });

        add_btn.addEventListener("click", function (event) {
            scroll_fix.classList.add("fixed");
            filter.classList.remove("hide");
            opened.classList.add("hide");
            create.classList.remove("hide");
        });

        close.addEventListener("click", function (event) {
            filter.classList.add("hide");
            opened.classList.add("hide");
            create.classList.add("hide");
            scroll_fix.classList.remove("fixed");
        });



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