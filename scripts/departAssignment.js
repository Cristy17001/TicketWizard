function handleDepartChange(selected) {
    let numbers = selected.value.split(" ");
    let depart_id = numbers[0];
    let user_id = numbers[1];

    console.log("UserId:", user_id);
    console.log("departId:", depart_id);

    // Create an XMLHttpRequest object
    let xhr = new XMLHttpRequest();

    xhr.open('POST', '../adminActions/actionChangeDepart.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    // Define the data to be sent
    let data = 'depart_id=' + encodeURIComponent(depart_id) + '&user_id=' + encodeURIComponent(user_id);

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
}