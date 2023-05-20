document.addEventListener('DOMContentLoaded', function() {
    const remove_btns = document.querySelectorAll(".remove-btn");

    remove_btns.forEach((remove_btn) => {
        remove_btn.addEventListener("click", function (event) {
            let id = event.currentTarget.closest(".question").getAttribute("id");
            // Get the actual faq table id
            let faq_id = id.match(/\d+$/)[0];

            // Create an XMLHttpRequest object
            let xhr = new XMLHttpRequest();

            xhr.open('POST', '../actions/actionremovefaq.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            // Define the data to be sent
            let data = 'id=' + faq_id;

            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Handle the response from the server
                    let response = xhr.responseText;

                    // Refresh the page
                    location.reload();
                }
            };


            // Send the request with the data
            xhr.send(data);
        });
    });
});