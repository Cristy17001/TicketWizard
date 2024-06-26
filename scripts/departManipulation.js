function removeDepartment(id) {
    // Create an XMLHttpRequest object
    let xhr = new XMLHttpRequest();

    xhr.open('POST', '../adminActions/actionRmvDepart.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    // Define the data to be sent
    let data = 'id=' + id;

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

function removeStatus(id) {
    // Create an XMLHttpRequest object
    let xhr = new XMLHttpRequest();

    xhr.open('POST', '../adminActions/actionRmvStatus.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    // Define the data to be sent
    let data = 'id=' + id;

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

function removeHashtag(id) {
    // Create an XMLHttpRequest object
    let xhr = new XMLHttpRequest();

    xhr.open('POST', '../adminActions/actionRmvHashtag.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    // Define the data to be sent
    let data = 'id=' + id;

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
