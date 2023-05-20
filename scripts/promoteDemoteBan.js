function promote_user(id) {
    // Create an XMLHttpRequest object
    let xhr = new XMLHttpRequest();

    xhr.open('POST', '../actions/actionPromoteUser.php', true);
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


    console.log(id);
}
function demote_user(id) {

    // Create an XMLHttpRequest object
    let xhr = new XMLHttpRequest();

    xhr.open('POST', '../actions/actionDemoteUser.php', true);
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

    console.log(id);
}

function ban_user(id) {

    // Create an XMLHttpRequest object
    let xhr = new XMLHttpRequest();

    xhr.open('POST', '../actions/actionBanUser.php', true);
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

    console.log(id);
}