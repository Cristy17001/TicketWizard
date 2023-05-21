// Get the fragment identifier from the URL
const fragmentId = window.location.hash.substring(1);

// Check if the fragment identifier matches the format "Ticket..."
if (fragmentId.startsWith('Ticket')) {
    // Extract the ticket ID from the fragment identifier
    const ticketId = fragmentId.substring(6);

    // Find the corresponding dialog element by ID
    const dialog = document.getElementById('Ticket' + ticketId);
    let opened_closed_btn = dialog.querySelector(".close");
    // Open the dialog if it exists
    if (dialog) {
        dialog.showModal();
    }

    dialog.addEventListener("click", e => {
        const dialogDimensions = dialog.getBoundingClientRect();
        if (
            e.clientX < dialogDimensions.left ||
            e.clientX > dialogDimensions.right ||
            e.clientY < dialogDimensions.top ||
            e.clientY > dialogDimensions.bottom
        ) {
            dialog.close();
        }
    });
    opened_closed_btn.addEventListener("click", function (event) {
            dialog.close();
    });
}