function removeTicketHashtag($ticket_id, $hashtag_id) {
    // Create an XMLHttpRequest object
    let xhr = new XMLHttpRequest();

    xhr.open('POST', '../actions/actionRemoveTicketHash.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    // Define the data to be sent
    let data = 'ticket_id=' + encodeURIComponent($ticket_id) + '&hashtag_id=' + encodeURIComponent($hashtag_id);

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