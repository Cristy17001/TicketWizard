function sortByDate() {
  var ticketsContainer = document.querySelector(".tickets-container")
  var tickets = document.querySelectorAll(".ticket");
  // Sort the tickets based on the date column
  tickets = Array.from(tickets).sort(function(ticketA, ticketB){
    var createdA = ticketA.querySelector(".frontSide .created").textContent;
    var createdB = ticketB.querySelector(".frontSide .created").textContent;
    if((new Date(createdB) - new Date(createdA))<=0){
      return new Date(createdB) - new Date(createdA);
    } else {
      return new Date(createdA) - new Date(createdB);
    }
  });

  // Reattach the sorted tickets to the container
  for (var i = 0; i < tickets.length; i++) {
    ticketsContainer.appendChild(tickets[i]);
  }
}
// Attach event listener to the "Sort by Date" button
var sortByDateBtn = document.getElementById("Sort");
sortByDateBtn.addEventListener("click", sortByDate);