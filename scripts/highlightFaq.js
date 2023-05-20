document.addEventListener('DOMContentLoaded', function() {
    // Get the id on the url
    let lastUrlSegment = window.location.hash.substring(1);
    console.log(lastUrlSegment);
    let question = document.getElementById(lastUrlSegment);
    if (question !== null) {
        question.classList.add("highlight_faq");
    }
});