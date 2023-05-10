document.addEventListener('DOMContentLoaded', function() {
    // Add ticket necessary variables
    const add_btn = document.querySelector(".add-btn");
    const add_form = document.querySelector(".create-card");

    // Ticket open and rotation necessary variables
    const tickets = document.querySelectorAll(".innerCard");
    const opened = document.querySelector(".opened-ticket");
    const opened_closed_btn = document.querySelector(".opened-ticket > .close");


    // ADD TICKET LOGIC
    //====================================================================//
    add_btn.addEventListener("click", function (event) {
        add_form.showModal();
    });

    add_form.addEventListener("click", e => {
        const dialogDimensions = add_form.getBoundingClientRect()
        if (
            e.clientX < dialogDimensions.left ||
            e.clientX > dialogDimensions.right ||
            e.clientY < dialogDimensions.top ||
            e.clientY > dialogDimensions.bottom
        ) {
            add_form.close()
        }
    });
    //====================================================================//

    // TICKET LOGIC
    //====================================================================//
    tickets.forEach((ticket) => {
        // TICKET ROTATION
        //====================================================================//
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
        //====================================================================//

        // TICKET OPENING
        //====================================================================//
        ticket.addEventListener("click", function (event) {
            opened.showModal();
        });

        opened_closed_btn.addEventListener("click", function (event) {
            opened.close();
        });

        opened.addEventListener("click", e => {
            const dialogDimensions = opened.getBoundingClientRect()
            if (
                e.clientX < dialogDimensions.left ||
                e.clientX > dialogDimensions.right ||
                e.clientY < dialogDimensions.top ||
                e.clientY > dialogDimensions.bottom
            ) {
                opened.close()
            }
        });
        //====================================================================//



    });
    //====================================================================//

});