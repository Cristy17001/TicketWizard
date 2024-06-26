document.addEventListener('DOMContentLoaded', function() {
    const copy_btns = document.querySelectorAll(".copy-btn");


    copy_btns.forEach((copy_btn) => {
        copy_btn.addEventListener("click", function (event) {
            // Show copied message
            //=================================================================
            let copiedMessage = event.currentTarget.querySelector('.copied-msg');
            let copyMessage = event.currentTarget.querySelector('.copy-msg');

            copiedMessage.classList.add('show-copied');
            copyMessage.classList.add('hide-copied');
            // Hide the "Link copied" message after 2 seconds (optional)
            setTimeout(function () {
                copiedMessage.classList.remove('show-copied');
                copyMessage.classList.remove('hide-copied');

            }, 2000);
            //=================================================================



            let id = event.currentTarget.closest(".question").getAttribute("id");
            let hostname = window.location.hostname;
            let port = window.location.port;

            if (port) {
                hostname += ':' + port;
            }

            let faqUrl = hostname + "/pages/faq.php";
            let data = faqUrl + '#' + id;
            navigator.clipboard.writeText(data).then(() => {
                console.log("Link copied to clipboard:", data);
            })
                .catch((error) => {
                    console.error("Failed to copy link to clipboard:", error);
                });
        });
    });
});