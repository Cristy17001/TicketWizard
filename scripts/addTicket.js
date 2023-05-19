document.addEventListener('DOMContentLoaded', function() {
    // Add ticket necessary variables
    const add_btn = document.querySelector(".add-btn");
    const add_form = document.querySelector(".create-card");

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
});