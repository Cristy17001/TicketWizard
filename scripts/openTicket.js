document.addEventListener('DOMContentLoaded', function() {
    // Ticket open and rotation necessary variables
    const tickets = document.querySelectorAll(".innerCard");

    // TICKET LOGIC
    //====================================================================//
    tickets.forEach((ticket) => {
        //====================================================================//
        // TICKET OPENING
        //====================================================================//

        ticket.addEventListener("click", function (event) {
            let opened_ticket_id = event.currentTarget.getAttribute("ticket_id");
            //console.log("ticket_id = ", opened_ticket_id);
            let current_dialog = document.querySelector(`dialog[ticket_id="${opened_ticket_id}"]`);
            //console.log(current_dialog);
            let opened_closed_btn = current_dialog.querySelector(".close");
            current_dialog.showModal();

            opened_closed_btn.addEventListener("click", function (event) {
                current_dialog.close();
            });

            current_dialog.addEventListener("click", e => {
                const dialogDimensions = current_dialog.getBoundingClientRect()
                if (
                    e.clientX < dialogDimensions.left ||
                    e.clientX > dialogDimensions.right ||
                    e.clientY < dialogDimensions.top ||
                    e.clientY > dialogDimensions.bottom
                ) {
                    current_dialog.close()
                }
            });
        });
        //====================================================================//
    });
});