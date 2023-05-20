document.addEventListener('DOMContentLoaded', function() {
    const filter_select = document.querySelector(".form-filter");
    let table_container = document.querySelector('.table-container');

    filter_select.addEventListener('change', function (event) {
        if (this.value !== "") {
            // Create an XMLHttpRequest object
            let xhr = new XMLHttpRequest();

            xhr.open('POST', '../pages/admin.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            // Define the data to be sent
            let data = 'data=' + this.value;
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Handle the response from the server, that is the content for the table container
                    table_container.innerHTML = xhr.responseText;
                }
            };


            // Send the request with the data
            xhr.send(data);
        }
        else {
            table_container.innerHTML = "";
        }
    });
});
