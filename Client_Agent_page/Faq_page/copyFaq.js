document.addEventListener('DOMContentLoaded', function() {
    const copy_btns = document.querySelectorAll(".copy-btn");


    copy_btns.forEach((copy_btn) => {
        copy_btn.addEventListener("click", function (event) {
            copyLink();
            let link = event.currentTarget.getAttribute("link");
            let id = event.currentTarget.getAttribute("id")
            navigator.clipboard.writeText(link + "#" + id).then(() => {
                console.log("Link copied to clipboard:", link);
            })
                .catch((error) => {
                    console.error("Failed to copy link to clipboard:", error);
                });
        });
    });
    function copyLink() {
        // Show the "Link copied" message
        let copiedMessage = document.querySelector('.copied-msg');
        let copyMessage = document.querySelector('.copy-msg');

        copiedMessage.classList.add('show-copied');
        copyMessage.classList.add('hide-copied');
        // Hide the "Link copied" message after 2 seconds (optional)
        setTimeout(function () {
            copiedMessage.classList.remove('show-copied');
            copyMessage.classList.remove('hide-copied');

        }, 2000);
    }
});